<?php

namespace App\Http\Controllers;


use App\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\comment;
use App\User;
use App\Post;
class RepliesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( )
    {
            $user = Auth::user();
         $post_id =Post::findorFail($id);   
         $comme = comment::all();
         $posts = DB::table('users')->leftJoin('replies','replies.user_id','users.id')->where('comment_id',$id)->get();
         return view('showcomment')->with('replies',$posts);
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
            Reply::create([
                'comment_id' => $request->input('comment_id'),
                'firstname' => Auth::user()->firstname,
                'lastname' => Auth::user()->lastname,
                'reply' => $request->input('reply'),
                'user_id' => Auth::user()->id,
                
            ]);

            return back()->with('success','Reply added');
        }

        return back()->withInput()->with('error','Something wronmg');
        
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
    public function destroy(Reply $reply)
    {
        if (Auth::check()) {
            $reply = Reply::where(['id'=>$reply->id,'user_id'=>Auth::user()->id]);
            if ($reply->delete()) {
                return 1;
            }else{
                return 2;
            }
        }else{

        }
        return 3;
    }
}
