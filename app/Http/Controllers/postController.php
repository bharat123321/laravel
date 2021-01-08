<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Post;
use App\comment;
use App\Like;
use App\friendship;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
 use Carbon\Carbon;
class postController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $posts = Post::all();
         $posts = Post::orderBy('created_at', 'desc')->get();
         // $countlike = Like::where(['like' => '1']);
         // $countdislike = Like::where(['like' => '0']);
        //  DB::table('users')->where('id')->update(['avatar'=>$filename]);
     return view('post',array('user'=>Auth::user(),'post'=> $posts));
    }
    public function showpost(Request $request){
           $uid = Auth::user()->id;
        $posts = Post::get();
        $friended = friendship::get();
         $comments = comment::get();

         return view('posts/index')->with('post',$posts)->with('users',$uid);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
         $like = DB::table('likes')->insert(['user_id'=>Auth::user()->id ,'post_id'=>$post->id,' like'=>$like ]);
         return view('post')->with(['like'=>$like]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $video=$request->video; 
        if (isset($_POST['submit']) && empty($_POST['body']) 
               && empty($request->image) && empty($request->video)) {

               return back()->with('msg','You have not choose any thing');
       }
       
        $body= $request->body;
         
        $post = new Post;
         $image=$request->image;
          $post->body = $body;
          $video=$request->video; 
        
           $post->created_at =\Carbon\Carbon::now()->toDateTimeString();
           $post->updated_at = \Carbon\Carbon::now()->toDateTimeString() ;
        $post->user_id = Auth::user()->id;
         if ($request->hasFile('image')) {
            $filename = time() . '.' . $image->getClientOriginalExtension();
               $image->move("uploads/image",$filename);
            $post->image = $filename;
            
             }
            else if ($request->hasFile('video')) {
            $filename = time() . '.' . $video->getClientOriginalExtension();
               $video->move("uploads/video",$filename);
            $post->video = $filename;
            
             }
             else{
                echo 'skdj';
             }
 
             $post->save();
         
                return back();
                 
                 
                    

       
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
    /*public function destroy($id)
    {
        $post_id = $requst['postId'];
         $is_like = $request['isLike']=='true';
         $update =false;
         $post = Post::find($post_id);
         if(!$post){
            return null;
         }
          $user = Auth::user();
          $like = $user->likes()->where('post_id',$post_id)->first();
          if($like){
            $already_like = $like->like;
            $update = true;
            if ($already_like == $is_like){
                $like->delete();
                return null;
            }
          }else{
            $like = new Like();
          }
           $like->like = $is_like;
           $like->user_id = $user->id;
           $like->post_id = $post->id;
           if($update){
            $like->update();
           }           
           else{
            $like->save();
           }
           return null;
    }*/
}
