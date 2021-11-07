<?php

namespace App\Http\Controllers\v1\User;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Mentor;
use App\Models\MentorUser;
use App\Models\OneChat;
use App\Models\Question;
use App\Models\Review;
use App\Models\Task;
use Validator;
use Illuminate\Support\Carbon;
use Hash;
use Exception;
use Mail;
use Illuminate\support\Facades\Storage;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Support\Str;
use App\Http\Service\NewsletterService;
use App\Http\Service\EmailService;
use App\Models\Transaction;

class MentorController extends Controller
{
    protected $mailchip;
    protected $emailService;
    public function __construct(NewsletterService $newsletterService, EmailService $emailService){
        //$this->middleware('cors');
        $this->mailchip = $newsletterService;
        $this->emailService = $emailService;
        $this->middleware('auth:mentors')->except('filterMentor', 'index', 'mentors', 'overview');

    }

    public function index(){
        $mentors =  Mentor::all()->shuffle();
        $categories = Category::all();
        
        return view('mentor.mentors')->with(['categories' => $categories, 'mentors' => $mentors]);
    }

    public function overview($username){
        $mentor =  Mentor::where('username', $username)->first();
        $categories = Category::all();
        return view('mentor-page')->with(['categories' => $categories, 'mentor' => $mentor]);
    }

    public function profilePic(Request $request){
        try {
            $validator = Validator::make($request->all(), [
                "profilepic" => ["required"]
            ]);
            //dd($request->file('profile-pic')->getRealPath());
            if ($validator->passes()) {
               // dd($request->file('profilepic'));
                // check if user does have not pic
                $filename = $request->file('profilepic')->getRealPath();
                
                if (auth()->user()->pic == null) {
                    //dd($request->file('profilepic'));
                    \Cloudder::upload($filename, null, ["eager" => [
                        "width" => 660, "height" => 400,
                        "crop" => "pad"]]);
                    //get response
                    $result = \Cloudder::getResult();
                
                    $url = explode('/', $result['url']);
                    $str = $result['url'];
                    //length string
                    $lenStr = strlen($str);
                    //length of the last array element
                    $lastStr = $url[count($url)-2]."/".$url[count($url)-1];
                    $lenLastStr = strlen($lastStr);
                    //remove lenght of last string from length of the str
                    $leftStrLength = $lenStr - $lenLastStr;
                    //remove the last str
                    $leftStr = substr($str, 0, $leftStrLength);
                    //join string with ar_1.0,c_fill/r_max
                    $newStr = $leftStr."ar_1.0,c_fill/r_max/".$lastStr;
        
                    //update user profile pic
                    auth()->user()->update([
                        "pic" => $newStr,
                        'pic_id' => $url[count($url)-2]
                    ]);
        
                    return redirect()->back();
                }
                $publicId = auth()->user()->pic_id;
                \Cloudder::destroyImage($publicId);
                \Cloudder::delete($publicId);
    
                \Cloudder::upload($filename, null, ["eager" => [
                    "width" => 660, "height" => 400,
                    "crop" => "pad"]]);
                //get response
                $result = \Cloudder::getResult();
               // $publicId = $result['public_id'];
                //$url = \Cloudder::showPrivateUrl($publicId, 'png');
                //dd($url);

                $url = explode('/', $result['url']);
                $str = $result['url'];
                //length string
                $lenStr = strlen($str);
                //length of the last array element
                $changeType = explode('.',$url[count($url)-1]); // change type to png
                //dd($changeType);
                $lastStr = $url[count($url)-2]."/".($changeType[0].'.png');
                $lenLastStr = strlen($lastStr);
                //remove lenght of last string from length of the str
                $leftStrLength = $lenStr - $lenLastStr;
                //remove the last str
                $leftStr = substr($str, 0, $leftStrLength);
                //join string with ar_1.0,c_fill/r_max
                $newStr = $leftStr."ar_1.0,c_fill/r_max/".$lastStr;
                
                //update user profile pic
                auth()->user()->update([
                    "pic" => $newStr,
                    'pic_id' => $url[count($url)-2]
                ]);
    
                return redirect()->back();
    
            }
            return response()->json([
                "errors" => $validator->errors()
            ]);
        } catch (Exception $ex) {
            return abort(500);
        }
        

        
    }

    public function filterMentor(Request $request){
        $categories = Category::all();
        //query mentors
        $mentors = Mentor::all();
        $filter = null;
        if (!empty($request->name)) {
            // filter by name
            $mentors = $mentors->filter(function ($mentor)use($request) {
                $fullname = $mentor->fullname();
                
                if(stristr($fullname, $request->name)) return $mentor;
            });
        }
        
        if (!empty($request->category)) {
            // filter by category
            $mentors = $mentors->filter(function ($mentor)use($request) {
                $categoryId = $request->category;

                if($mentor->category_id == $categoryId) return $mentor;
            });
        }

        if (!empty($request->tag)) {
            // filter request by tag
            $mentors = $mentors->filter(function ($mentor)use($request) {
                $tagArray = json_decode($mentor->tag);
                if(in_array($request->tag, $tagArray)) return $mentor;
            });
        }
        
        if (!empty($request->price)) {
            // filter request by price
            $mentors = $mentors->filter(function ($mentor)use($request) {
                $price = $request->price;
                if($mentor->price() >= $price) return $mentor;
            });
        }
        return view('mentor.mentors')->with(['categories' => $categories, 'mentors' => $mentors]);
    
        /*return response()->json([
            "mentors" => $mentors->all()
        ]);*/

    }

    // retrive mentors

    public function mentors(){
        return Mentor::all();
    }

    // return view dahboard
    public function dashboard(Request $request){
        $previousTransactions = auth()->user()->transactions->filter(function($data){
            return $data->status == 'success';
        });

        $pendingTransactions = auth()->user()->transactions->filter(function($data){
            return $data->status == 'pending';
        });

        return view('mentor.dashboard', compact('previousTransactions', 'pendingTransactions'));
    }

    // return view of profile page of mentor

    public function profile(){
        $services = auth()->user()->services;
        $user = auth()->user();
        //dd(explode(',', json_decode($user->tag)[0]));
        return view('mentor.profile', ['user' => auth()->user(), 'categories' => Category::all(), 'services' => $services]);
    }

    // update user personal details

    public function updateUserPersonalDetails(Request $request){
        //validate user
        $validator = FacadesValidator::make($request->all(), [
            'first_name' => "required",
            'last_name' => "required",
            'email_address' => "required",
            'bio' => "required",
            'password' => "required|confirmed",
            'career_success' => "required",
            'social' => "required",
            'tag' => "required",
            //'service' => "required"
        ]);

        // if validator passes
        if($validator->passes()){
            $firstname = $request->first_name;
            $lastname = $request->last_name;
            $email = $request->email_address;
            $bio = $request->bio;
            $social = $request->social;
            $password = $request->password;
            $career_success = $request->career_success;
            $why_a_mentor = $request->why_a_mentor;
            $tag = $request->tag;

            auth()->user()->update([
                'first_name' => $firstname,
                'lastname' => $lastname,
                'email' => $email,
                'bio' => $bio,
                'social' => json_encode($social),
                'password' => Hash::make($password),
                'career_success' => $career_success,
                //'why_a_mentor' => $why_a_mentor,
                'tag' => json_encode([$tag])
            ]);

            return redirect()->back()->with(['success' => 'profile updated!']);
        }

        // return error if validator fails
        return redirect()->back()->withErrors($validator->errors())->with(['personal-profile-error' => 'personal-profile']);
        
    }

    // update user company details

    public function updateUserCompanyDetails(Request $request){
        $validator = FacadesValidator::make($request->all(), [
            'company_name' => "required",
            'job_title' => "required",
            'level' => "required",
        ]);
        
        if($validator->passes()){
            $companyname = $request->company_name;
            $jobtitle = $request->job_title;
            $level = $request->level;

            auth()->user()->update([
                'companyname' => $companyname,
                'jobtitle' => $jobtitle,
                'level' => $level,
            ]);

            return redirect()->back()->with(['success' => 'profile updated!']);
        }

        return redirect()->back()->withErrors($validator->errors())->with(['company-profile-error' => 'company-profile']);
        
    }

    public function updateUserCompanyservice(Request $request){
        $validator = FacadesValidator::make($request->all(), [
            'services' => "required"
        ]);
        
        if($validator->passes()){
            $service = $request->services;
            //dd($service);
            for ($i=1; $i <= count($service); $i++) { 
                auth()->user()->services()->updateExistingPivot($i, ["price" => $service[$i-1]]);
            }

            return redirect()->back()->with(['success' => 'profile updated!']);
        }

        return redirect()->back()->withErrors($validator->errors())->with(['mentor-service' => 'mentor-service']);
        
    }

    /**
     * @param id belongs to users(mentees)
     * 
     * @return
     */
    
    public function task(Request $request, $id){
        // get timestampp of expiry date
        $tasks = Task::where('mentor_id', auth()->user()->id)->where('user_id', $id)->get();
        $userId= $id;
        $user = User::firstWhere('id', $id);

        //query mentor user table 
        $mentorUser = MentorUser::where('user_id', $id)->where('mentor_id', auth()->user()->id)->first();
        // dd(json_decode($mentorUser->services)[0]);
        $service = json_decode($mentorUser->services);
        //$transaction = Transaction::where('mentor_user_id', $mentorUser->id)->where('created_at', '<', Carbon::now())->first();

        //dd($task);
        return view('mentor.task', compact('tasks', 'userId', 'user', 'service'));
    }

    /**
     * @param id belongs to users(mentees)
     * 
     * @return
     */
    public function createTask(Request $request, $id){
        // get timestampp of expiry date
        $now = Carbon::now();
        $expiryDate = $request->expiry_date;
        $diff = $now->diff($request->expiry_date);
        $timeleft = ["days" => $diff->d,"hours" => $diff->h, "min" => $diff->m, "sec" => $diff->s];
        // create new task

        $task = new Task;
        $task->title = $request->title;
        $task->todo = $request->todo;
        $task->expiry_date = $expiryDate;
        $task->time_left = json_encode($timeleft);
        $task->mentor_id = auth()->user()->id;
        $task->user_id = $id;
        $task->save();

        //send mail to mentee
        $mentee = User::whereId($id)->first();
        $customData = [
            'email' => $mentee->email,
            'user' => $mentee->fullname(),
            'mentor' => $task->mentors->fullname()
        ];

        $to = $mentee->email;
        $subject = 'Mentorship.ng | Task Assigned';
        $view = 'mail.mentee-task';
        //send mail
        $this->emailService->send($customData, $to, $subject, $view);

        return redirect()->back();
    }

    /**
     * @param id task id
     * 
     * @return update user task
     */
    public function updateTask(Request $request, $id){
        // get timestampp of expiry date
        // edit new task
        try {
            $now = Carbon::now();
            $expiryDate = $request->expiry_date;
            $diff = $now->diff($expiryDate);
            
            $timeleft = ["days" => $diff->d,"hours" => $diff->h, "min" => $diff->m, "sec" => $diff->s];
            //dd($timeleft);
            $task = Task::whereId($id)->first();

            $task->update([
                "title" => $request->title,
                "todo" => $request->todo,
                "expiry_date" => $expiryDate,
                "time_left" => json_encode($timeleft),
            ]);

            return redirect()->back()->with(["success" => "Updated Successfully!"]);
        } catch (Exception $ex) {
            return redirect()->back();
        }
        
    }
    

    public function deleteTask($id){
        try {
            $task = Task::whereId($id)->first();

            $task->delete();

            return redirect()->back()->with(["success" => "Deleted Successfully!"]);
        } catch (Exception $ex) {
            return redirect()->back();
        }
        
    }

    /**
     * view task submission
     * 
     */

     public function submission($taskId, $userId){
        $user = User::whereId($userId)->first();

        $task = Task::whereId($taskId)->first();

        return view('submission', compact('user', 'task'));
     }
    /**
     * @param id belongs to users(mentees)
     * 
     * @return
     */
    public function retrivementorTask(Request $request, $id){
        // get task that belong to the mentee and the mentor
        $task = Task::where('user_id', $id)->where('mentor_id', auth()->user()->id)->get();

        // return
        return redirect()->back();
    }

    
    /**
     * @param id task id
     * 
     * @return delete user task
     */
    public function deleteMentorTask(Request $request, $id){
        // get task that belong to the mentee and the mentor
        $task = Task::whereId($id)->where('mentor_id', auth()->user()->id)->delete();

        // return
        return redirect()->back();
    }

    /**
     * @param Request $request all mentees
     * 
     * @return
     */
    public function retriveMentees(){
        // get mentees that belongs to mentor
        
        $mentees = auth()->user()->mentees;

        $activeMentees = auth()->user()->activeMentees;
       
        $inactiveMentees = auth()->user()->inactiveMentees;
        $unApproveMentees = auth()->user()->unApproveMentees;
        // return view
        // /dd($activeMentees);
        return view('mentor.mentee', compact('mentees', 'activeMentees', 'inactiveMentees', 'unApproveMentees'));
    }

    /**
     * @param Request $request approve mentee
     * 
     * @return
     */
    public function approveMentee($id){
        // get mentees that belongs to mentor
        $mentor = auth()->user();
        //add user to chat
        OneChat::create([
            "sender_type" => "App\Model\Mentor",
            "receiver_type" => "App\Model\User",
            "sender_id" => auth()->user()->id,
            "receiver_id" => $id,
            "channel" => Str::random(6)
        ]);

        //delete user answers 
        Answer::where('mentor_id', auth()->user()->id)->where('user_id', $id)->delete();
        
        $mentor->mentees()->attach($id, [
            'is_approve' => 1,
            'status' => "inactive"
        ]);


        $mentee = User::firstWhere('id', $id);

        
        $customData = [
            'email' => $mentee->email,
            'user' => $mentee->fullname(),
        ];

        $to = $mentee->email;
        $subject = 'Registration | Approved';
        $view = 'mail.mentee-approve';

        $this->emailService->send($customData, $to, $subject, $view);

        //subscribe user to mailchip
        $tag = "mentee";
        //dd($mentee);
        if(!$this->mailchip->subscribe($mentee->email, $mentee->first_name, $mentee->last_name, $tag)) throw new Exception("Something went wrong");
        
        return redirect()->back()->with(["success" => "User approved"]);
    }

    /**
     * @param view question for mentor
     * 
     * @return
     */
    public function viewQuestions(Request $request){
        // get mentees that belongs to mentor
        $questions = auth()->user()->questions;
        // /dd($questions);
        // return view
        return view('mentor.questions', compact('questions'));
    }

    /**
     * @param Request add new question for mentor
     * 
     * @return
     */
    public function addQuestions(Request $request){
        // get mentees that belongs to mentor
        Question::create([
            'content' => $request->content,
            'mentor_id' => auth()->user()->id
        ]);
        $questions = auth()->user()->questions;
        // return view
        return redirect()->back()->with(["success" => "Question successfully added"]);
    }

    /**
     * @param Request add new question for mentor
     * 
     * @return
     */
    public function updateQuestions(Request $request, $id){
        
        $question = Question::whereId($id)->update([
            "content" => $request->content
        ]);
        // return view
        return redirect()->back()->with(["success" => "Question successfully updated"]);
    }

    /**
     * @param Request delete mentor question
     * 
     * @return
     */

    public function deleteQuestions(Request $request, $id){
        // get mentees that belongs to mentor
        $question = Question::whereId($id)->delete();
        // return view
        return redirect()->back()->with(["success" => "Question successfully deleted"]);
    }

    public function delayMentorship(Request $request){
        $menteeId = $request->id;

        //retrive mentoruser table
        $mentorUser = MentorUser::where('mentor_id', auth()->user()->id)
        ->where('user_id', $menteeId)->where('status', 'active')->first();

        $diffInMinutes = Carbon::now()->diffInMinutes($mentorUser->end_date);
        //dd($diffInMinutes);
        $value = $request->delay == 1 ? 0 : 1;

        if ($value == 1) {
            $user = auth()->user()->mentees()->updateExistingPivot($menteeId, [
                "delay" => $value,
                "interval" => $diffInMinutes,
            ]);
        }else {
            auth()->user()->mentees()->updateExistingPivot($menteeId, [
                "delay" => $value,
                "interval" => null,
                "start_date" => Carbon::now(),
                "end_date" => Carbon::now()->addMinutes($mentorUser->interval)
            ]);
        }

        return redirect()->back();
    }

    public function newMentees()
    {
        //query unique answer so as to get unique user
        $users = Answer::where('mentor_id', auth()->user()->id)->with('user')->get()->unique('user_id');
        //dd($users);
        return view('mentor.newMentees', compact('users'));
    }

    

}
