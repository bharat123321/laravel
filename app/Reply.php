<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
     protected $fillable = [
    	'comment_id',
    	'firstname',
    	'lastname',
    	'reply',
    	'user_id'
    ];
    public function comment(){
    	return $this->hasMany('App\comment');
    }
}
