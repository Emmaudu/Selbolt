<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Mentor;
use Illuminate\Http\Request;
use App\Models\User;
use Mail;
use Hash;
use Exception;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Illuminate\Support\Facades\Mail as FacadesMail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Http\Service\NewsletterService;
use App\Http\Service\EmailService;
use App\Http\Traits\SetMailChimpEnvironmentKey;
use App\Http\Traits\AuthorizeUserView;

class RegisterController extends Controller
{
    use SetMailChimpEnvironmentKey, AuthorizeUserView;

    protected $mailchip;
    protected $emailService;

    public function __construct(NewsletterService $newsletterService, EmailService $emailService)
    {
        $this->mailchip = $newsletterService;
        $this->emailService = $emailService;
    }

    /**
     * register user function
     */
    public function index(){
        $this->checkAuthentication();
        //return abort(403);
        return view('auth.register');
    }

    public function verifyMailView(){
        $this->checkAuthentication();
        return view('verify-user');
    }

    public function register(Request $request){

        try {
            $validator = Validator::make($request->all(), [
                'first_name' => 'required|alpha',
                'last_name' => 'required|alpha',
                'email' => 'required|email|unique:users',
                'password' => 'required|confirmed|min:6',
                'phone_number' => 'required|digits:11'
            ]);
            
            if ($validator->passes()) {
                $token = Str::random(6);
        
                $customData = [
                    'email' => $request->email,
                    'token' => $token,
                    'subject' => 'Account | Verification'
                ];
        
                $to = $request->email;
                $subject = 'Account | Verification';
                $view = 'mail.verify-email';
                
               $this->emailService->send($customData, $to, $subject, $view);

                User::create([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'phone_number' => $request->phone_number,
                    'password' => FacadesHash::make($request->password),
                    'verification_code' => $token,
                    'login_status' => 'offline'
                ]);
                
                return redirect()->to('/verify-mail');
    
            }
            return redirect()->back()->withInput()->withErrors($validator->errors());
        } catch (Exception $ex) {
            return response()->json(['message' => $ex->getMessage()], 500);
        }
        
        
    }

    public function verifyMail(Request $request){
        $this->checkAuthentication();
        $token = $request->token;

        if(empty($token)){
            return redirect()->back()->withInput()->withErrors(["error" => "Invalid verification code"]);
        }
        $user = User::where('verification_code', $token)->first();
        $mentor = Mentor::where('verification_code', $token)->first();
        // check if user has verification code
        if (!empty($user)) {
            $user->verification_code = null;
            $user->save();

            //set mentors key
            $this->setAudienceKey('5fd10dc8c4');
            //
            $this->setKeyOnEnvironmentChange();

            $this->mailchip->subscribe($user->email, $user->first_name, $user->last_name, 'mentee');

            return redirect()->to('/login');
        }elseif (!empty($mentor)) {
            $mentor->verification_code = null;
            $mentor->save();
            
            return redirect()->to('/tasker/login');
        }
        return redirect()->back()->withInput()->withErrors(["error" => "Invalid verification code"]);
       
    }
}

