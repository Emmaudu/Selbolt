<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use denis660\Centrifugo\Centrifugo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Illuminate\Support\Carbon;
use App\Models\Messages;
use App\Models\User;
use App\Http\Middleware\CorsOrgin;
use App\Http\Repositories\RTC\Centrifugo as RTCCentrifugo;
use App\Http\Service\EmailService;
use App\Models\Admin;
use App\Models\OneChat;
use App\Models\Mentor;
use App\Models\Category;

class ConnectionController extends Controller
{
    protected $emailService;
    protected $guard;
    protected $rtccentrifugo;

    public function __construct(EmailService $emailService, RTCCentrifugo $rtccentrifugo){
        // $this->middleware('corss');$this->guard();
        $this->middleware('auth:web,mentors');
        $this->emailService = $emailService;
        $this->rtccentrifugo = $rtccentrifugo;
    }

    public function user(Centrifugo $centrifugo){
        $this->guard();
        $token = $centrifugo->generateConnectionToken((string)auth()->guard($this->guard)->user()->id, 0, [
            'name' => auth()->guard($this->guard)->user()->fullname(),
        ]);

        return response()->json([
            "user" => auth()->guard($this->guard)->user(),
            "token" => $token
        ]);
    }

    /**
     * retrive message receivers
     * @param
     */

    public function messages(Centrifugo $centrifugo){
        $this->guard();
        $custom_id = session()->get('receiver_id');
        
        $checkUser = $this->checkUserType($custom_id);
        $authUserId = auth()->guard($this->guard)->user()->id;
        $customAuthUserId = auth()->guard($this->guard)->user()->custom_id;
        $receiverId = $checkUser[1];
        $customReceiverId = $custom_id;
        $receiverType = $checkUser[0];
        $type = $this->checkUserType(auth()->guard($this->guard)->user()->custom_id)[0];
        
        //get chat
        $chat = OneChat::where([['sender_id', $authUserId], ['sender_type', $type], ['receiver_id', $receiverId], ['receiver_type', $receiverType]])
            
        ->orwhere([['sender_id', $receiverId], ['sender_type', $receiverType], ['receiver_id', $authUserId], ['receiver_type', $type]])->first();

        //messages
        $messages = Messages::where([['sender_id', $customAuthUserId], ['sender_type', $type], ['receiver_id', $customReceiverId], ['receiver_type', $receiverType]])
            
            ->orwhere([['sender_id', $customReceiverId], ['sender_type', $receiverType], ['receiver_id', $customAuthUserId], ['receiver_type', $type]])->orderBy('created_at')->get();

        //publish to centrifugo
        $chatChannel = $chat->channel;
        $this->rtccentrifugo->publish($chatChannel, ["messages" => $messages]);

        return response()->json([
           "messages" => $messages
        ]);
    
    }
    
    public function receivers(Centrifugo $centrifugo){
        $this->guard();
        $token = $centrifugo->generateConnectionToken((string)auth()->guard($this->guard)->user()->id, 0, [
            'name' => auth()->guard($this->guard)->user()->fullname(),
        ]);
        
        $receivers = auth()->guard($this->guard)->user()->chatMembers();

        //$this->rtccentrifugo->publish($chatChannel, ["messages" => $messages]);

        return response()->json([
            "receivers" => $receivers,
            "token" => $token,
            'channels' => $this->channels()
        ]);

    }

    public function receiver(Centrifugo $centrifugo){
        $this->guard();
        $token = $centrifugo->generateConnectionToken((string)auth()->guard($this->guard)->user()->id, 0, [
            'name' => auth()->guard($this->guard)->user()->fullname(),
        ]);

        $custom_id = session()->get('receiver_id');

        $authUserId = auth()->guard($this->guard)->user()->id;
        $type = $this->checkUserType(auth()->guard($this->guard)->user()->custom_id)[0];
        $checkUser = $this->checkUserType($custom_id);
        $receiverId = $checkUser[1];
        $receiverType = $checkUser[0];
        
        //get channel
        //get chat
        $chat = OneChat::where([['sender_id', $authUserId], ['sender_type', $type], ['receiver_id', $receiverId], ['receiver_type', $receiverType]])
            
        ->orwhere([['sender_id', $receiverId], ['sender_type', $receiverType], ['receiver_id', $authUserId], ['receiver_type', $type]])->first();
        //check if user is the receiver or sender
        // note mentor is refer to as sender and mentee is refer to as receiver
        
        if (auth()->guard($this->guard)->user() instanceof Mentor) {
            $receiver = $chat->receiver;
        }else{
            $receiver = $chat->sender;
        }

        $chatChannel = $chat->channel;

        return response()->json([
            "receiver" => $receiver,
            "token" => $token,
            'channel' => $chatChannel
        ]);

    }
    
   /**
    * generate token
    * @param message view
    */

    public function messageView(Centrifugo $centrifugo, $id){
        
        $this->guard();
        //dd($this->guard);
        // Generate connection token

        $token = $centrifugo->generateConnectionToken((string)auth()->guard($this->guard)->user()->id, 0, [
            'name' => auth()->guard($this->guard)->user()->fullname(),
        ]);
        
        session()->put('receiver_id', $id);
        // return view
        return view('message', compact('token'));

    }

    public function sendMessage(Request $request, Centrifugo $centrifugo){
        $this->guard();
        $chatChannel = $request->channel;
        $receiver_id = session()->get('receiver_id');
        //$custom_id = session()->get('receiver_id');

        $checkUser = $this->checkUserType($receiver_id);
        //$receiver_id = $checkUser[1];
        $receiver_type = $checkUser[0];

        $type = $this->checkUserType(auth()->guard($this->guard)->user()->custom_id)[0];
        $id = auth()->guard($this->guard)->user()->custom_id;

        $body = $request->message;
        // $content = $request->message;
        // $dom = new \DomDocument();
        // $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD); 
        
        // $images = $dom->getElementsByTagName('img');
        
        // foreach($images as $k => $img){
        //     $data = $img->getAttribute('src');

        //     list($type, $data) = explode(';', $data);
        //     list(, $data)      = explode(',', $data);
        //     $data = base64_decode($data);

        //     $image_name= "/img/" . time().$k.'.png';

        //     $public_id = "12345/".time().$k; // for cloudinary piblic id;

        //     $path = public_path() . $image_name;
        //     file_put_contents($path, $data);

        //     $filename = $path;

        //     // Upload file to cloudinary for summernote access
        //     \Cloudder::upload($filename);
        //     //get response
            
        //     $img->removeAttribute('src');
        //     $img->setAttribute('src', \Cloudder::getResult()['url']);
        //     \File::delete($path);
        // }
        // //end summernote
        // $content = $dom->saveHTML();
        
        $time = Carbon::now();
        
        // store message in db
        $message = $this->storeMessage($id, $type, $receiver_id, $receiver_type, $body);

        //messages
        $messages = Messages::where([['sender_id', $id], ['sender_type', $type], ['receiver_id', $receiver_id], ['receiver_type', $receiver_type]])
            
            ->orwhere([['sender_id', $receiver_id], ['sender_type', $receiver_type], ['receiver_id', $id], ['receiver_type', $type]])->orderBy('created_at')->get();

        
        $this->rtccentrifugo->publish($chatChannel, ["messages" => $messages]);
        

        //send mail if receiver is offline
        $receiver = $receiver_type::where('id', $checkUser[1])->first();
        if ($receiver->login_status == "offline") {
            $this->sendMail($receiver, $body);
        }

        return response()->json([
            "message" => $request->all(),
            "history" => $centrifugo->history('channel')
        ]);

    }

    /**
     * @param $sender_id, $receiver_id, $body
     * @return
     */

    public function storeMessage($id, $type, $receiver_id, $receiver_type, $body){
        // store messages in database
        $this->guard();
        $message = Messages::create([
            'sender_id' => $id,
            'sender_type' => $type,
            'receiver_id' => $receiver_id,
            'receiver_type' => $receiver_type,
            'body' => $body
            //'read_at' =>  
        ]);
        return $message;
    }

    public function checkUserType($custom_id){
        $this->guard();
        $array = explode('-', $custom_id);
        $userClass = $array[0] == 'mentor' ? 'App\Models\Mentor' : 'App\Models\User';
        $userId = $array[1];

        return [$userClass, $userId];
    }

    public function channels(){
        $this->guard();
        $type = $this->checkUserType(auth()->guard($this->guard)->user()->custom_id)[0];
        $authUserId = auth()->guard($this->guard)->user()->id;

        $chat = OneChat::where([['sender_id', $authUserId], ['sender_type', $type]])
        ->orwhere([['receiver_id', $authUserId], ['receiver_type', $type]])->get()->pluck('channel');
        
        return $chat;

    }

    public function sendMail($receiver, $message){
        $this->guard();
        $customData = [
            'email' => $receiver->email,
            'user' => $receiver->fullname(),
            'message' => $message,
            'sender' => auth()->guard($this->guard)->user()->fullname() 
        ];

        $to = $receiver->email;
        $subject = 'New | Message';
        $view = 'mail.new-message';

        $this->emailService->send($customData, $to, $subject, $view);
    }

    public function guard(){
        $guards = ['mentors', 'admins', 'webs'];

        return collect($guards)->first(fn ($guard) => auth($guard)->check());
        //$this->guard();
        if (auth()->user() instanceof Mentor) {
            $this->guard = 'mentors';
        }elseif(auth()->user() instanceof Admin){
            $this->guard = 'admins';
        }else{
            $this->guard = 'web';
        }
    }

}
