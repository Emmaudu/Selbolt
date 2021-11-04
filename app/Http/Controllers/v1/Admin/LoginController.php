<?php

namespace App\Http\Controllers\v1\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Validator;
use Auth;
use Hash;

class LoginController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth:admins')->only('logout');
    }

    public function index(){
        return view('admin.login');
    }

    public function authenticate(Request $request){
        
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admins')->attempt($credentials)) {
            //dd($request->all());
            return redirect()->intended('/admin/dashboard');
        }
            
        return redirect()->back()->withInput()->withErrors('Incorrect Login Credentials');    

    }

    /**
     * Logout
     * 
     *  */ 

    public function logout() {
        
        auth()->guard('admins')->logout();

        return redirect()->route('admin.login');
    }
}
