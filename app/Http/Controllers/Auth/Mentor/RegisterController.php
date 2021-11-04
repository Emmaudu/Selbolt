<?php

namespace App\Http\Controllers\Auth\Mentor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mentor;
use Auth;
use App\Models\Service;
//use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\Category;

class RegisterController extends Controller
{
    
    /**
     * register user function
     */
    public function index(){
        $categories = Category::all();
        $services = Service::all();
        return view('auth.mentor.register', compact('categories', 'services'));
    }

    public function verifyMailView(){
        return view('verify-user');
    }

    public function register(Request $request){
        try {
            $validator = Validator::make($request->all(), [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email|unique:mentors',
                'password' => 'required|confirmed|min:6',
                'job_title' => 'required',
                'company_name' => 'required',
                'level' => 'required',
                'price' => 'required',
                'bio' => 'required',
                'tag' => 'required',
                'services' => 'required',
                'why_a_mentor' => 'required',
                'career_success' => 'required'
            ]);
            
            //print_r($request->all());
            //dd($request->all());

            if ($validator->passes()) {
                $token = Str::random(6);
                $service = $request->services;
                $categoryId = $request->category;
                $tags = explode(',', $request->tag);
                //dd($tags);
                $data = [
                    'email' => $request->email,
                    'token' => $token,
                ];
                
                // send confirmation mail to mentor
                /*Mail::send(
                    'verify-email',
                    ["data" => $data],
                    function ($m)use($data) {
                    $m->from('mentorship@gmail.com');
                    $m->to($data['email'])->subject('Please confirm you mail');
                });*/

                $mentor = Mentor::create([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'country' => $request->country,
                    'password' => Hash::make($request->password),
                    'verification_code' => $token,
                    'job_title' => $request->job_title,
                    'company_name' => $request->company_name,
                    'level' => $request->level,
                    'category_id' => $categoryId,
                    'bio' => $request->bio,
                    'tag' => json_encode($tags),
                    'social' => json_encode($request->social),
                    'why_a_mentor' => $request->why_a_mentor,
                    'career_success' => $request->career_success,
                    'username' => $request->first_name.''.$request->last_name.''.$token,
                    'login_status' => "offline",
                    'is_approve' => 0
                ]);

                for ($i=1; $i <= count($service); $i++) { 
                    $mentor->services()->attach($i, ["price" => $service[$i-1]]);
                }

                return redirect()->to('/verify-mail');
    
            }
            return redirect()->back()->withInput()->withErrors($validator->errors());
        } catch (Exception $ex) {
            //return response()->json(['message' => $ex->getMessage()], 500);
        }
        
        
    }

    public function verifyMail(Request $request){
        $token = $request->token;

        if(empty($token)){
            return redirect()->back()->withInput()->withErrors(["error" => "Invalid verification code"]);
        }
        $mentor = Mentor::where('verification_code', $token)->first();
        // check if user has verification code
        if (!empty($mentor)) {
            $mentor->verification_code = null;
            $mentor>save();
            return redirect()->to('/login');
        }
        return redirect()->back()->withInput()->withErrors(["error" => "Invalid verification code"]);
       
    }

}
