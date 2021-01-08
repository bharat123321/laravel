<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class friendship extends Model
{
   protected $fillable = ['acceptor','user_requested','post_id_1_U','post_id_2_A','status'];

   public function post(){
   
    return $this->hasMany('App\Post');
}
 public function user()
{
return $this->belongsTo('App\User');
}

 public function likes() {
        return $this->hasMany('App\Like');
    }
    public function dislikes() {
        return $this->hasMany('App\Dislike');
    }
    public function messenger(){
    	return $this->belongsTo('App\messenger');
    }

}