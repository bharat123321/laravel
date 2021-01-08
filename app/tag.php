<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{ 
	public function post{
		return $this->belongsTo('App\Post');
	}
	public function user(){
		return $this->belongsTo('App\User');
	}
	public function friendship(){
		return $this->belongsTo('App\friendships');
	}
}
