<?php

namespace App\Http\Controllers;

use App\comment;
use App\Reply;
use Session; 
use App\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\notifications;
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
         $user = Auth::user();
         $post_id =Post::findorFail($id);   
         $comme = comment::all();
         $posts = DB::table('users')->leftJoin('comments','comments.user_id','users.id')->where('post_id',$id)->get();
         $replies = DB::table('users')->leftJoin('replies','replies.user_id','users.id')->get();
         return view('showcomment')->with('showcomment',$posts)->with('replies',$replies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::check()) {
            comment::create([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'comment' => $request->input('comment'),
                'user_id' => Auth::user()->id,
                'post_id'=>$request->input('post_id'),
                 
            ]);
            
           // $thread = $request->input('post_id');
           // $thread->$request->input('comment');
               
           //   auth::user()->notify(new notifications($thread));

            return back()->with('success','Comment Added successfully..!');
                // return redirect('/index');
        }else{
            return back()->withInput()->with('error','Something wrong');
    }
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(comment $comment)
    {
        if (Auth::check()) {

            $reply = Reply::where(['comment_id'=>$comment->id]);
            $comment = Comment::where(['user_id'=>Auth::user()->id, 'id'=>$comment->id]);
            if ($reply->count() > 0 && $comment->count() > 0) {
                $reply->delete();
                $comment->delete();
                return 1;
            }else if($comment->count() > 0){
                $comment->delete();
                return 2;
            }else{
                return 3;
            }

        }    }
}
