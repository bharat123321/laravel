<?php

namespace App\Friend;
use App\friendships;
use Illuminate\Http\Request;
trait Friendable {
    public function addFriend(Request $request){
        
        $Friendship = friendships::create([
            
            'user_requested' => $this->id, // who is logged in
            'acceptor' => $request->user_id,
            'post_id'=>$request->post_id,
            'created_at' =>\Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString() 
        ]);
        
        if($Friendship)
        {
            
            return $Friendship;
        }
        
        return 'failed';
                
    }

  

}
