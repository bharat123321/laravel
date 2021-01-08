<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Post;
use App\postview;
use App\comment;
use App\Like;
use App\story;
use App\Dislike;
use App\friendship;
use Illuminate\Support\Facades\DB;
class ProfileController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request){ 
  
         $uid = Auth::user()->id;
        $posts =  Post::all();
        $story = story::all();
        
        $friended = friendship::get();
        

      $friends1 = DB::table('friendships')
                ->leftJoin('users', 'users.id', 'friendships.user_requested') 
                // who is not loggedin but send request to
                ->leftJoin('posts','posts.user_id','friendships.user_requested')
                 
                ->where('status', 1)
                ->where('acceptor', $uid) // who is loggedin
                ->get();

        $friends2 = DB::table('friendships')
                ->leftJoin('users', 'users.id', 'friendships.acceptor')
                ->leftJoin('posts', 'posts.user_id', 'friendships.acceptor')
                
                ->where('status', 1)
                ->where('user_requested', $uid)
                ->get();
             
      $countlike = DB::table('likes')->leftJoin('posts','posts.id','likes.post_id')->where(['like' => 1])->get();
     $countdislike = Like::where(['like' => '0'])->get();
     $countComment = DB::table('comments')->leftJoin('posts','posts.id','comments.post_id')->where(['statues'=>1])->get();
       $friends = array_merge($friends1->toArray(), $friends2->toArray());
   /* From here  story*/
        $friendst1 = DB::table('friendships')
         ->leftJoin('users', 'users.id', 'friendships.user_requested') 
                 ->leftJoin('stories','stories.user_id','friendships.user_requested')
                ->where('status', 1)
                ->where('acceptor', $uid) // who is loggedin
                ->get();

        $friendst2 = DB::table('friendships') 
                ->leftJoin('users', 'users.id', 'friendships.acceptor')
                ->leftJoin('stories', 'stories.user_id', 'friendships.acceptor')
                ->where('status', 1)
                ->where('user_requested', $uid)
                ->get();
        
        $friendstory = array_merge($friendst1->toArray(), $friendst2->toArray());
      //view from here
            $posted =DB::table('posts')->leftJoin('postviews','postviews.post_id','posts.id')->get();
     return view('posts.index')->with('post',$posts)->with('users',$uid)->with('friends',$friends)->with('countlike',$countlike)->with('countdislike',$countdislike)->with('countComment',$countComment)->with('poststory',$story)->with('friendstory',$friendstory)->with('posted',$posted);
    }
    public function profile(){
        
    	return view('profile',array('user'=>Auth::user()));
    }
public function update_profile(Request $request){
	$avatar = $request->file('avatar'); 
    if($request->hasFile('avatar')){
     $filename = time() . '.' . $avatar->getClientOriginalExtension();	
       $avatar->move("uploads/avatar",$filename);
       $obj = Auth::user()->id;
         DB::table('users')->where('id',$obj)->update(['avatar'=>$filename]);
             }
             
          return back();
 
}

          // Add information function
public function add_info(){
           
           
 
}

}
