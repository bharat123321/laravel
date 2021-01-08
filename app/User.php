<?php

namespace App;
use App\Friend\Friendable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
     use Friendable;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */ 
    protected $fillable = [
        'firstname','lastname','username','avatar','email', 'password','address','gender','country',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function comment(){
        return $this->hasMany('App\comment');
    }
    public function likes()
{
     return $this->hasMany('App\Like');
}
    public function post(){
    return $this->hasMany('App\Post');
}public function story(){
    return $this->hasMany('App\Post');
}
  public function messenger() {
        return $this->hasMany('App\messenger');
    }
    
  public function view(){
    return $this->hasOne('App\view');
  }
  
   public function friendship(){
        return $this->hasMany('App\friendships');
    }
}
