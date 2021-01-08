<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
	  protected $fillable = [
        'user_id','like','post_id',
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
    public function story(){
      return $this->belongsTo('App\story');
    }
}
