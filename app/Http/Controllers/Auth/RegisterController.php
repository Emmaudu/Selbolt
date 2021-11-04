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

class RegisterController extends Controller
{
    /**
     * register user function
     */
    public function index(){
        return view('auth.register');
    }

    public function verifyMailView(){
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
                $data = [
                    'email' => $request->email,
                    'token' => $token,
                ];
                
               /* FacadesMail::send(
                    'verify-email',
                    ["data" => $data],
                    function ($m)use($data) {
                    $m->from('mentorship@gmail.com');
                    $m->to($data['email'])->subject('Please confirm you mail');
                });*/

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
            return redirect()->to('/login');
        }elseif (!empty($mentor)) {
            $mentor->verification_code = null;
            $mentor->save();
            return redirect()->to('/mentor/login');
        }
        return redirect()->back()->withInput()->withErrors(["error" => "Invalid verification code"]);
       
    }
}

