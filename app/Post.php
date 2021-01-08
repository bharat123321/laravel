<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model 
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

    public function comment() {
        return $this->hasMany('App\Comment');
    }

     public function friendship(){
        return $this->belongsTo('App\friendship');
    }
    public function view(){
        return $this->belongsTo('App\view');
    }
    public function postview(){
        return $this->hasMany('App\postview');
    }
    public function tag(){
        return $this->belongsTo('App\tag');
    }
    public function formattedCreatedDate() {
       if ($this->created_at->diffInDays() > 30) {
            return 'Created at ' . $this->created_at->toFormattedDateString();
        } else {
            return 'Created ' . $this->created_at->diffForHumans();
        }
    }
}
