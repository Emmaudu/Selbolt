<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Mail as FacadesMail;
use Illuminate\Support\Str;
use App\Http\Traits\AuthorizeUserView;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers, AuthorizeUserView;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:web')->except('logout');
    }

    public function index(){
        $this->checkAuthentication();
        
        return view('auth.login');
    }

    public function authenticate(Request $request){
        $token = Str::random(6);

        $data = [
            'email' => $request->email,
            'token' => $token,
        ];

        $credentials = $request->only('email', 'password');
        $user = User::where('email', $request->email)->first();
        if($user && $user->verification_code != null){
            FacadesMail::send(
                'verify-email',
                ["data" => $data],
                function ($m)use($data) {
                $m->from('mentorship@gmail.com');
                $m->to($data['email'])->subject('Please confirm you mail');
            });

            return redirect()->back()->withInput()->withErrors('Please check your email for verification code');
        }

        if (Auth::guard('web')->attempt($credentials)) {
            $user->login_status = "online";
            $user->save();
            
            return redirect()->intended(route('mentee.dashboard'));
        }

        return redirect()->back()->withInput()->withErrors('Incorrect Login Credentials');
    }

    public function logout(){
    //    / User::whereId('id', auth()->user()->id)->first();
        auth()->user()->update([
            "login_status" => "offline"
        ]);
        
        Auth::logout();
        return redirect()->to(route('login-mentee'));
    }
    
}
