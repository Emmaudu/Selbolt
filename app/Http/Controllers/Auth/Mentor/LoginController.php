<?php

namespace App\Http\Controllers\Auth\Mentor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mentor;
use Auth;
use Illuminate\Support\Facades\Mail as FacadesMail;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('guest:mentors')->except('logout');
    }

    public function index(){
        return view('auth.mentor.login');
    }

    public function authenticate(Request $request){
        
        $token = Str::random(6);

        $data = [
            'email' => $request->email,
            'token' => $token,
        ];

        $credentials = $request->only('email', 'password');
        $mentor = Mentor::where('email', $request->email)->first();
        if($mentor && $mentor->verification_code != null){
            FacadesMail::send(
                'verify-email',
                ["data" => $data],
                function ($m)use($data) {
                $m->from('mentorship@gmail.com');
                $m->to($data['email'])->subject('Please confirm you mail');
            });

            return redirect()->back()->withInput()->withErrors('Please check your email for verification code');
        }
        
        if (Auth::guard('mentors')->attempt($credentials) && $mentor->is_approve == 1) {
            $mentor->login_status = "online";
            $mentor->save();

            return redirect()->intended(route('mentor.dashboard'));
        }

        return redirect()->back()->withInput()->withErrors('Incorrect Login Credentials');
    }

    public function logout(){
        //$mentor->login_status = "online";
        auth()->guard('mentors')->user()->update([
            "login_status" => "offline"
        ]);
        auth()->guard('mentors')->logout();
        return redirect()->to(route('login-mentor'));
    }
}
