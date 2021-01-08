<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\messenger;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Pusher\Pusher;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('id','!=',Auth::user()->id)->get();
        return view('home')->with('user',$user);
    }
    public function getMessage($id){
        //getting all messages for selected user
        $my_id = Auth::id();


        $messages = messenger::where(function($query) use ($id, $my_id){

            $query->where('user_requested_id',$my_id)->where('acceptor_id',$id);})->orWhere(function($query) use ($id , $my_id){
                $query->where('user_requested_id',$id)->where('acceptor_id',$my_id);})->get();

           
            
         return view('message.index')->with('message',$messages);
       

    }
    public function sendMessage(Request $request){
  

                  $user_requested_id = Auth::id();
        $acceptor_id = $request->input('receiver_id');

        $message = $request->message;

        $data = new messenger();
        $data->user_requested_id = $user_requested_id;
        $data->acceptor_id = $acceptor_id;
        $data->message = $message;
        $data->status = 1; // message will be unread when sending message
        $data->save();
        return back();
                 

    }
}
