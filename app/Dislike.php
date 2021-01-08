<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dislike extends Model
{
     protected $fillable = [
        'user_id','dislike','post_id',
    ];

      public function user()
{
return $this->belongsTo('App\User');
}
  public function post(){
  	return $this->belongsTo('App\Post');
  }
   public function friendship(){
        return $this->belongsTo('App\friendship');
    }
}
