<?php

namespace App\Http\Controllers\v1\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mentor;
use App\Models\Admin;
use Exception;
use App\Http\Service\NewsletterService;
use App\Http\Service\EmailService;

class AdminMentorController extends Controller
{
    protected $mailchip;
    protected $emailService;

    public function __construct(NewsletterService $newsletterService, EmailService $emailService){
        $this->middleware('auth:admins');
        $this->mailchip = $newsletterService;
        $this->emailService = $emailService;
    }

    public function deactivateMentor($id){
        try {
            $user = Mentor::whereId($id)->first();
            
            if(empty($user)) throw new Exception("user does not exist");
            $user->delete();
            
            $customData = [
                'email' => $user->email,
                'user' => $user->fullname(),
            ];
    
            $to = $user->email;
            $subject = 'Account | Deactivated';
            $view = 'mail.mentor-deactivated';
    
            $this->emailService->send($customData, $to, $subject, $view);

            return redirect()->back()->with(["success" => "user deactivated!"]);

        } catch (Exception $ex) {
            return abort(403);
        }
        
    }

    public function mentors(){
        $users =  Mentor::all();

        return view('admin.mentor', compact('users'));
    }

    public function mentorDetails($id){
        $mentor = Mentor::whereId($id)->first();
    //    / dd($mentor->pendingTransactions()->sum('amount'));
        return view('admin.mentordetails', compact('mentor'));
    }

    public function getDeactivatedMentors(){
        $deactivatedMentors = Mentor::onlyTrashed()->get();

        return view('admin.deactivatedmentors', compact('deactivatedMentors'));

    }

    public function permanentDelete($id){
        $deacticatedMentors = Mentor::onlyTrashed()->get();
        if ($deacticatedMentors->isEmpty()) {
            return response()->json([
                "message" => "user not on deactivation"
            ], 200);
        }
        $deleteDeacticatedMentor = Mentor::onlyTrashed()->whereId($id)->forceDelete();

        return redirect()->back()->with(["success" => "user deleted!"]);
    }

    public function activateMentor($id){
        try {
            Mentor::onlyTrashed()->whereId($id)->restore();

            return redirect()->back()->with(["success" => "user restored!"]);;
        } catch (Exception $th) {
            return response()->json([
                "message" => "invalid user"
            ], 400);
        }
        
    }

    public function getMentors(){
        $users = Mentor::all();
        return response()->json([
            "users" => $users
        ], 200);
    }

    public function registrationList(){
        $users =  Mentor::where('is_approve', 0)->get();

        return view('admin.newmentors', compact('users'));
    }

    public function viewMentorRegistrationList($id){
        $mentor =  Mentor::whereId($id)->first();

        return view('admin.admission', compact('mentor'));
    }

    public function approve($id){
        // approve the user
        $mentor = Mentor::whereId($id)->first();
        $mentor->is_approve = 1;
        $mentor->save();
        $tag = "mentor";

        $customData = [
            'email' => $mentor->email,
            'user' => $mentor->fullname(),
        ];

        $to = $mentor->email;
        $subject = 'Account | Approved';
        $view = 'mail.mentor-approve';
        //send mail
        $this->emailService->send($customData, $to, $subject, $view);
        //subscribe user to mailchip
        if(!$this->mailchip->subscribe($mentor->email, $mentor->first_name, $mentor->last_name, $tag)) throw new Exception("Something went wrong");

        return redirect()->to('/admin/mentors/registration/lists');
    }

    public function reject($id){
        // approve the user
        $mentor = Mentor::whereId($id)->forceDelete();

        $customData = [
            'email' => $mentor->email,
            'user' => $mentor->fullname(),
        ];

        $to = $mentor->email;
        $subject = 'Account | Deleted';
        $view = 'mail.mentor-delete';
        //send mail
        $this->emailService->send($customData, $to, $subject, $view);

        return redirect()->to('/admin/mentors/registration/lists');
    }

}
