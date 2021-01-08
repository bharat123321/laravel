<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\messenger;
use App\User;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
 use App\PusherFactory\PusherFactory;
use App\Events\MessageSent;
use Pusher\Pusher;
class messengerController extends Controller

{
	 public function __construct()
    {
        $this->middleware('auth');
     }
     public function index(){
     	 
          // $users = User::where('id','!=', Auth::id())->get();
       
             
 
     $uid = Auth::user()->id;
        
         $user1 = DB::table('friendships')
                ->leftJoin('users', 'users.id', 'friendships.user_requested') 
                // who is not loggedin but send request to
                ->where('status', 1)
                ->where('acceptor', $uid) // who is loggedin
                ->get();

        $user2 = DB::table('friendships')
                ->leftJoin('users', 'users.id', 'friendships.acceptor')
                ->where('status', 1)
                ->where('user_requested', $uid)
                ->get();
             
     
     

        $users = array_merge($user1->toArray(), $user2->toArray());

    
        return view('message/message')->with('users',$users);
     }
       public function getMessage($id){
        //getting all messages for selected user
        $my_id = Auth::id();


        $messages = messenger::where(function($query) use ($id, $my_id){

            $query->where('user_requested_id',$my_id)->where('acceptor_id',$id);})->orWhere(function($query) use ($id , $my_id){
                $query->where('user_requested_id',$id)->where('acceptor_id',$my_id);})->get();
                $usered = User::where(['id'=>$id])->first();
                
         return view('message.index')->with('message',$messages)->with('users',$usered);
     

    }
     public function sendMessage(Request $request){
             
               $from = Auth::id();
               $to = $request->input('receiver_id');
               $message = $request->input('message');
               $data = new messenger();
               $data->user_requested_id = $from;
               $data->acceptor_id = $to;
               $data->message = $message;
               $data->status = 0;
               $data->save();
                
         $options = [
  'cluster' => 'ap2',
  'useTLS' => true,
];
 
$pusher = new Pusher (
env(PUSHER_APP_ID),
env(PUSHER_APP_KEY),
env(PUSHER_APP_SECRET),
$options
);
   $data = ['from'=>$from,'to' => $to];
   
   $pusher->trigger('my-channel','my-event',$data);           
     
}
}
