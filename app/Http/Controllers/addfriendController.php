<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\friendship;
use App\User;
use App\notification;
 
class addfriendController extends Controller
{ 

    public function addFriend(Request $request){
        if (Auth::check()) {
         friendship::create([
            
            'user_requested' => Auth::user()->id, // who is logged in
            'acceptor' => $request->acceptor_id,
             
            'created_at' =>\Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString() 
        ]);
     }
     return back();
    }
      
     //   public function addFriend(Request $request){
     // Auth::user()->addFriend($request->acceptor_id,$request->post_id);
     
     //    return back();
     //   }

        public function request() {
        
        $uid = Auth::user()->id;
        if($uid>0){

        
        $FriendRequests = DB::table('friendships')
                        ->rightJoin('users', 'users.id', '=', 'friendships.user_requested')
                         ->where('status', '=', Null)
                        ->where('friendships.acceptor', '=', $uid)->get();
}
else{
     
}

    return view('friend.friend_request',['user'=>Auth::user(),'FriendRequests'=>$FriendRequests]);
    }

    public function accept($name, $id) {
        $image = User::findorFail($id);
        $uid = Auth::user()->id;
        
        $checkRequest = friendship::where('user_requested', $id)
                ->where('acceptor', $uid)
                ->first();
        if ($checkRequest) {
            // echo "yes, update here";

            $updateFriendship = DB::table('friendships')
                    ->where('acceptor', $uid)
                    ->where('user_requested', $id)
                    ->update(['status' => 1]);

            $notifications = new notification;
            $notifications->note = 'accepted your friend request';
            $notifications->acceptor = $id; // who is accepting my request
            $notifications->user_requested = Auth::user()->id; // me
            $notifications->status = '1'; // unread notifications
             
            $notifications->save();
            return back()->with('msg', 'You are now Friend with ' . $name);
            }
          return back()->with('msg', 'In your id no one has friend');
    }
    //       public function friends() {
    //     $uid = Auth::user()->id;

    //     $friends1 = DB::table('friendships')
    //             ->leftJoin('users', 'users.id', 'friendships.user_requested') // who is not loggedin but send request to
    //             ->where('status', 1)
    //             ->where('acceptor', $uid) // who is loggedin
    //             ->get();

    //     //dd($friends1);

    //     $friends2 = DB::table('friendships')
    //             ->leftJoin('users', 'users.id', 'friendships.acceptor')
    //             ->where('status', 1)
    //             ->where('user_requested', $uid)
    //             ->get();

    //     $friends = array_merge($friends1->toArray(), $friends2->toArray());

    //     return view('index', compact('friends'));
    // }
    public function requestRemove($id) {

        DB::table('friendships')
                ->where('acceptor', Auth::user()->id)
                ->where('user_requested', $id)
                ->delete();

        return back()->with('msg', 'Request has been deleted');
    }
  
    //  public function notification($id){
    //    $uid = Auth::user()->id;
    //     $notes = DB::table('notifications')
    //             ->leftJoin('users', 'users.id', 'notifications.user_requested')
    //             ->where('notifications.id', $id)
    //             ->where('acceptor', $uid)
    //             ->orderBy('notifications.created_at', 'desc')
    //             ->get();

    //     $updateNoti = DB::table('notifications')
    //                  ->where('notifications.id', $id)
    //                 ->update(['status' => 0]);

    //    return view('friend.notification', compact('notes'));
    // } 
} 

?>