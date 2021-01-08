<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Like;
use App\Dislike;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
class likeController extends Controller
{
  public function index(Request $request){ 
         $post = Post::findorFail($request->receiver_id);
          $loggedin_user = Auth::user()->id;
          $post_id = $request->receiver_id;
          $like_user = Like::where(['user_id'=>$loggedin_user,'post_id'=>$post_id])->where('like',1)->first();
            
             $user_id = Auth::user()->id;
            // $email = Auth::user()->email;
             $post_id =$post_id;
             $like = new Like;
               if($like_user == false){ 
             $like->user_id = $user_id;
             $like->post_id = $post_id;
             $like->like = 1;
              $like->save();

              } 
               $like_user = Like::where(['user_id'=>$loggedin_user,'post_id'=>$post_id])->where('like',1)->get();
               foreach($like_user as $s){
                $fl = $s->like;
               }

               
                return response()->json(['result'=>$post->likes->count(),'checks'=>$fl]);
     
        
    }
    public function remove($id){

         
             
                DB::table('likes')
                ->where('user_id', Auth::user()->id)
                ->where('post_id', $id)
                ->delete();
              

        // DB::table('likes')->where(['user_id'=>Auth::user()->id ,'post_id'=>$id,'created_at' =>\Carbon\Carbon::now()->toDateTimeString(),'updated_at' =>\Carbon\Carbon::now()->toDateTimeString()])->delete();
        return back();
    }


    public function exibitlike($id){
          
         $user_id = Auth::user()->id;
        $post_id =Post::findorFail($id);
         $posts = DB::table('likes')->leftJoin('users','users.id','likes.user_id')->where('post_id',$id)->get();
         return view('showliked')->with('from_postid',$posts);

    }
}