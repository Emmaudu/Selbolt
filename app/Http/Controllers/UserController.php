<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;
use App\Models\Review;
use App\Models\Question;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Support\Facades\Hash;
use App\Models\Mentor;
use App\Models\MentorUser;
use Exception;
use Validator;
use Illuminate\Support\Carbon;

class UserController extends Controller
{
    public function __construct(){
        //$this->middleware('cors');
        $this->middleware('auth');
        //$this->middleware('auth')->only('serviceView');
    }

    public function user(){
        return 2;//auth()->user()->id;
    }

    public function profilePic(Request $request){
        $validator = Validator::make($request->all(), [
            "file" => ["required", "file"]
        ]);

        try {
            if ($validator->passes()) {
                // check if user does have not pic
                $filename = $request->file('file')->getRealPath();
                if (auth()->user()->pic == null) {
    
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
            return response()->json([
                "errors" => $validator->errors()
            ]);
        } catch (Exception $th) {
            return redirect()->back();
        }

        
    }

    public function index(){
        $pendingTransactions = auth()->user()->transactions->filter(function($data){
            return $data->status == 'pending';
        });
        $transactions = auth()->user()->transactions;
        
        return view('dashboard', \compact('pendingTransactions', 'transactions'));
    }

    public function serviceView(Request $request, $id){
        $mentor =  Mentor::whereId($id)->first();
        if ($mentor->subaccount_id == null) {
            return abort(404);
        }

        return view('mentor.service')->with(['mentors' => $mentor]);
    }

    public function profile(){
        $user = auth()->user();
        return view('profile', compact('user'));
    }

    public function updateProfile(Request $request){
        $validator = FacadesValidator::make($request->all(), [
            'first_name' => "required",
            'last_name' => "required",
            'email_address' => "required",
            'phone_number' => "required",
            'password' => "required|confirmed",
        ]);
        
        if ($validator->passes()) {
            auth()->user()->update([
                "first_name" => $request->first_name,
                "last_name" => $request->last_name,
                "phone_number" => $request->phone_number,
                "password" => Hash::make($request->password)
            ]);

            return redirect()->back()->with(['success' => 'profile updated!']);
        }

        return redirect()->back()->withErrors($validator->errors());
        
    }

    public function tasks(){
        
        $tasks = Task::where('user_id', auth()->user()->id)->where('submission', null)->with('mentors')->get();
        
        return view('tasks', compact('tasks'));
    }

    public function submitTask(Request $request){
        $id = $request->id;
        Task::where('id', $id)->update([
            "submission" => $request->content
        ]);
        
        return redirect()->back()->with(["success" => "Task submitted"]);
    }

    public function mentorship(){
        $mentors = MentorUser::where('user_id', auth()->user()->id)->where('is_approve', 1)->get();
        //dd($mentors);
        return view('mentorship', compact('mentors'));
    }
    
    public function review(Request $request)
    {
        Review::create([
            'description' => $request->description,
            'points' => $request->points,
            'name' => auth()->user()->fullname(),
            'mentor_id' => $request->mentor_id
        ]);

        return redirect()->back();
    }

    public function payMentor($username){
        $mentor =  Mentor::firstwhere('username', $username);
        
        session()->put('username', $username);
        return view('menteequestions')->with(['questions' => $mentor->questions]);
    }

    public function saveAnswers(Request $request)
    {
        $username = session()->get('username');

        $mentor = Mentor::firstWhere('username', $username);

        if ($request->exists('answers')) {
            foreach ($request->answers as $key => $value) {
                Answer::create([
                    "question_id" => $key,
                    "user_id" => auth()->user()->id,
                    "answer" => $value[0],
                    "mentor_id" => $mentor->id
                ]);
            }
        }else {
            $question = Question::create([
                'content' => $request->question,
                'mentor_id' => $mentor->id
            ]);
    
            Answer::create([
                "question_id" => $question->id,
                "user_id" => auth()->user()->id,
                "answer" => $request->answer,
                "mentor_id" => $mentor->id
            ]);
        }

        return view('success');
    }

    public function successPage(){
        return view('success');
    }
}
