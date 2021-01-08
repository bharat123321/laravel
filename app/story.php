<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class story extends Model
{
     protected $fillable = ['body','user_id','image','video'];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function likes() {
        return $this->hasMany('App\Like');
    }
    public function dislikes() {
        return $this->hasMany('App\Dislike');
    }

    public function comments() {
        return $this->hasMany('App\Comment');
    }

     public function friendship(){
        return $this->belongsTo('App\friendship');
    }
    public function view(){
        return $this->belongsTo('App\view');
    }
    public function tag(){
        return $this->belongsTo('App\tag');
    }
     public function formattedCreateDate() {
       if ($this->created_at->diffInDays() > 30) {
            return '  ' . $this->created_at->toFormattedDateString();
        } else {
            return '' . $this->created_at->diffForHumans();
        }
    }
}
