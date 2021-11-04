<?php

namespace App\Http\Controllers\v1\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use Exception;

class AdminUserController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admins');
    }

    public function dashboard(){
        $admin = auth()->guard('admins')->user();

        return view('admin.dashboard', compact('admin'));
    }

    public function users(){
        $users =  User::all();

        return view('admin.mentee', compact('users'));
    }

    public function userDetails($id){
        $mentee = User::whereId($id)->first();

        return view('admin.menteedetails', compact('mentee'));
    }

    public function deactivateUser($id){
        try {
            $user = User::whereId($id)->first();
            
            if(empty($user)) throw new Exception("user does not exist");
            $user->delete();
            
            return redirect()->back()->with(["success" => "user deactivated!"]);
        } catch (Exception $ex) {
            return abort(403);
        }
        
    }

    public function getDeactivatedUsers(){
        $deactivatedUsers = User::onlyTrashed()->get();

        return view('admin.deactivatedmentees', compact('deactivatedUsers'));
    }

    public function permanentDelete($id){
        $deacticatedUsers = User::onlyTrashed()->get();
        if ($deacticatedUsers->isEmpty()) {
            return response()->json([
                "message" => "user not on deactivation"
            ], 200);
        }
        $deleteDeactivatedUser = User::onlyTrashed()->whereId($id)->forceDelete();

        return redirect()->back()->with(["success" => "user deleted!"]);;
    }

    public function activateUser($id){
        try {
            User::onlyTrashed()->whereId($id)->restore();

            return redirect()->back()->with(["success" => "user restored!"]);
        } catch (Exception $th) {
            return response()->json([
                "message" => "invalid user"
            ], 400);
        }
        
    }

    public function getUsers(){
        $users = User::all();
        return response()->json([
            "users" => $users
        ], 200);
    }

}
