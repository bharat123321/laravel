<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\postview;
use App\Post;
class postviewController extends Controller
{
    public function show($id)
        {
 
            $post = Post::findorFail($id);

           

              $post->increment('views');//I have a separate column for views in the post table. This will increment the views column in the posts table.
            postview::createViewLog($post);
            return back();
        }
}
