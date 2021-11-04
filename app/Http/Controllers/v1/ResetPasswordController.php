<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Mentor;
use Validator;
use Exception;
use Hash;
use Illuminate\Contracts\Session\Session;

class ResetPasswordController extends Controller
{
    public function viewResetPasword($token){
        session()->put('token', $token);
        return view('auth.passwords.reset');
    }

    private $user;

    public function setUser($user){
        return $this->user = $user;
    }

    public function checkUser($token){
        $user = User::firstWhere('verification_code', $token);

        $mentor = Mentor::firstWhere('verification_code', $token);
        
        if ($user == null && $mentor == null) {
            return abort(403);
        }

        $user == null ? $this->setUser($mentor) : $this->setUser($user);
        return;
    }
    //
    public function isExpire($token){
        //check if token exist
        $user = $this->user::where('verification_code', $token)->first();

        //perform action if token exist
        if (!empty($user)) {
            // check for link life span if it has pass 30 minutes
            if (Carbon::now()->diffInMinutes($user->updated_at) < 3600) {
                return true;
            }else{
                return false;
            }
        }
        
        return false;

    }

    public function saveToken($password, $token)
    {
        $this->user->verification_code = null;
        $this->user->password = Hash::make($password);
        $this->user->save();
        return;
    }

    public function resetPassword(Request $request){
        
        $validator = Validator::make($request->all(), [
            'password' => 'required|confirmed',
        ]);

        
        $token = session()->get('token');
        if ($validator->passes()) {
            //check user
            $this->checkUser($token);
            
            if($this->isExpire($token) == false) throw new Exception('invalid token');
            
            $this->saveToken($request->password, $token);

            if ($this->user instanceof Mentor) {
                return redirect()->to('/mentor/login');
            }else {
                return redirect()->to('/login');
            }

        }else{
            return redirect()->back()->withErrors($validator->errors());
        }

    }
    
}
