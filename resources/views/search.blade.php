<!--     
     In search.blade.php we have done various things

     1.  we are searching friend and friend list and also send friend request

   !-->
@extends('layouts.app')
@section('content')

<style type="text/css">
	.search_design{
    border:100px;
    width:500px;
    border-width: 10px;
    border-radius: 10px;
    height: 250px;
    background: red;
    float: center;
  }
</style>
 
      <div class="container">
      <div class="row">
      <div class="col-md-8 col-md-offset-2">
        @if ( session()->has('msg') )
                         <p class="alert alert-success">
                                      {{ session()->get('msg') }}
                                     
                                   </p>
                                @endif
          <div class="panel panel-default">
                 
                <div class="panel-heading"><h1 style="color:blue;"><b><u>Find Your Friend</u></b></h1></div>

                <div class="panel-body comment-container" >
                	<div class="well">
           
           <b> {{$From_user->firstname}} {{$From_user->lastname}} </b>

   <a href="{{url('view/'.$From_user->id.'/')}}"> <img src="/uploads/avatar/{{$From_user->avatar}}" style="width: 50px;height: 100px;border-radius:50%;">  </a>    
          
           <!-- ADD FRIEND -->

          <!-- <a href="{{url('addFriend/'.$From_user->id.'/')}}" class="btn btn-info success" style="margin-left: 100px;">Add Friend</a> -->
            
             <?php
                  $user = Auth::user() ;

                                $check = DB::table('friendships')
                                        ->where('user_requested', '=',Auth::user()->id )
                                        ->where('acceptor', '=',$From_user->id )
                                        ->first();    
 
                                  if ($check == false) {
                                    
                                ?>
                                   <p> 
                                    
                     <form method="post" action="/addFriend">
                     {{csrf_field()}}
               
                            <!-- @foreach($From_user->post as $user_requested_post)              
              <input type="hidden" name="post_id_2" value="{{$user_requested_post->id}}">
               @endforeach -->
              <br>
              <input type="hidden" name="acceptor_id" value="{{$From_user->id}}">
                
               <input type="hidden" name="post_id_1" value="{{$user->id}}">    
                    
              
             <input type="submit" name="add_friend" class="btn btn-info btn-sm" value="Add to Friend">
                                           </form>
                                           
                                    </p>

                                <?php } else {?>
                                    <p>Request Already Sent</p>
                                <?php }?>
                               
                                <a href="{{url('/unfriend')}}/{{$From_user->id}}"  class="btn btn-default btn-sm">UnFriend</a>
                                <!-- close friend -->

           </div>
          <div class="well">
          </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection
 <!--   -->
