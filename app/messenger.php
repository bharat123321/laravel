<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class messenger extends Model
{
    protected $fillable = ['user_requested_id','acceptor_id','message','status'];

    public function user(){

    	return $this->belongsTo('App\User');
    }
    public function friendship(){

    	return $this->belongsTo('App\friendship');
    }
}
