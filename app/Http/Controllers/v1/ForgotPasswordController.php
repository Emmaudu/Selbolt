<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Mentor;
use Validator;
use Exception;
use Mail;
use App\Events\SendPasswordMail;
use Illuminate\Support\Str;
use App\Http\Service\EmailService;

class ForgotPasswordController extends Controller
{
    protected $emailService;
    
    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }

    public function index(){
        return view('auth.passwords.forgot');
    }

    private $user;

    public function setUser($user){
        return $this->user = $user;
    }

    public function saveVerificationCode($user, $verification_code)
    {
        $user->verification_code = $verification_code;
        $user->save();
        return;
    }

    public function sendMail($verification_code)
    {
        $customData = [
            'email' => $this->user->email,
            'user' => $this->user,
            'verification_code' => $verification_code
        ];
        $to = $this->user->email;
        $subject = 'Reset | Password!';
        $view = 'mail.resetmail';

        $this->emailService->send($customData, $to, $subject, $view);

        // Mail::send(
        // 'resetmail',
        //     ["customData" => $customData],
        //     function ($m)use($customData) {  
        //     $m->from('makindet74@gmail.com');
        //     $m->to($customData['email'])->subject('Reset | Password!');
        //     }
        // );

        return;
    }
    //
    public function forgotPassword(Request $request){
        //validate email
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        try {
            $user = User::firstWhere('email', $request->email);
            $mentor = Mentor::firstWhere('email', $request->email);
        
            if ($user == null && $mentor == null) {
                return abort(403);
            }

            if ($validator->passes()) {
                $verification_code = Str::random(10);
                $email = $request->email;
                
                $user == null ? $this->setUser($mentor) : $this->setUser($user);

                // add verification_code
                // /dd($this->user);
                $this->saveVerificationCode($this->user, $verification_code);

                //send reset passwword mail
                $this->sendMail($verification_code);
                //event(new SendPasswordMail($email, $user, $verification_code));

                //if(!$mail) throw new Exception('No connection established') ;
                
                return redirect()->back()->with(['message' => "mail sent!"]);
            }
            //return error message
            return redirect()->back()->withErrors($validator->errors());

        } catch (Exception $exception) {
            return redirect()->back()->with(['message' => "an error occurred!"]);
        }

    }
}
