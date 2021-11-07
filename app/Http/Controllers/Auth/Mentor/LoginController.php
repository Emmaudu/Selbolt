<?php

namespace App\Http\Controllers\Auth\Mentor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mentor;
use Auth;
use Illuminate\Support\Facades\Mail as FacadesMail;
use Illuminate\Support\Str;
use App\Http\Traits\AuthorizeUserView;

class LoginController extends Controller
{
    use AuthorizeUserView;
    
    public function __construct()
    {
        $this->middleware('guest:mentors')->except('logout');
    }

    public function index(){
        $this->checkAuthentication();
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
        
        if (Auth::guard('mentors')->attempt($credentials) && $mentor->is_approve == 1) {
            $mentor->login_status = "online";
            $mentor->save();

            return redirect()->intended(route('mentor.dashboard'));
        }

        return redirect()->back()->withInput()->withErrors('Incorrect Credentials or Yet to be approved!');
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
