<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
      protected $fillable = array(
        'firstname',
        'lastname',
        'comment',
        'user_id',
        'post_id'
    );


    public function replies(){
    	return $this->hasMany('App\Reply');
    }
    public function user(){
    	return $this->belongsTo('App\User');
    }
    public function posts() {
        return $this->belongsToMany('App\Post');
    }

}
