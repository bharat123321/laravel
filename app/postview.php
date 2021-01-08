<?php

namespace App;
use App\Post;
use Illuminate\Database\Eloquent\Model;
 


class postview extends Model
{
     public function post(){
     	return $this->belongsTo('App\Post');
     }
     public static function createViewLog($post) {
        $postViews= new postview();
        $postViews->post_id = $post->id;
        $postViews->url = request()->url();
        $postViews->session_id = request()->getSession()->getId();
        $postViews->user_id = (auth()->check())?auth()->id():null; 
        $postViews->ip = request()->ip();
        $postViews->agent = request()->header('User-Agent');
        $postViews->save();
    }
    public function showPost()
{
    if(auth()->id()==null){
        return $this->postView()
        ->where('ip', '=',  request()->ip())->exists();
    }

    return $this->postView()
    ->where(function($postViewsQuery) { $postViewsQuery
        ->where('session_id', '=', request()->getSession()->getId())
        ->orWhere('user_id', '=', (auth()->check()));})->exists();  
}

}
 
