<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Post;
use App\story;
use App\comment;
use App\Like;
use App\friendship;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class storyController extends Controller
{

  public function store(Request $request){
    $video=$request->video; 
        if (isset($_POST['submit']) && empty($_POST['body']) 
               && empty($request->image) && empty($request->video)) {

               return back()->with('msg','You have not choose any thing');
       }
       
        $body= $request->body;
         
        $post = new story;
         $image=$request->image;
          $post->body = $body;
          $video=$request->video; 
          echo $video;
        $post->user_id = Auth::user()->id;
         if ($request->hasFile('image')) {
            $filename = time() . '.' . $image->getClientOriginalExtension();
               $image->move("story_upload\images",$filename);
            $post->image = $filename;
            
             }
            else if ($request->hasFile('video')) {
            $filename = time() . '.' . $video->getClientOriginalExtension();
               $video->move("story_upload/video",$filename);
            $post->video = $filename;
            
             }
             else{
                echo 'skdj';
             }
 
             $post->save();
         
                return back();
                 
  }

 }