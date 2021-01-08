<style type="text/css">
  .profile{
       border:100px;
       width:100%;
       height: 100%;
       background: skyblue;
      
  }
  .bar{
    border:100px;
    width:500px;
    border-width: 10px;
    border-radius: 10px;
    height: 250px;
    background: red;
    margin-left: -10px;
    margin-top: -20px;
  }
  
</style>
@extends('layouts.app')

@section('content')
<div class="profile">
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
       <div class="bar">
        <!--upload image-->
            <img src="/uploads/avatar/{{$user->avatar}}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right: 25px;">
            <h2><u style="color:black;" >{{strtoupper($user->firstname)}}{{strtoupper($user->lastname)}} Profile </u></h2>
         <form method="POST" enctype="multipart/form-data"  action="/profile">
           <label style="color:black;"><u>Choose Your Profile</u></label>
           <input type="file" name="avatar" style="color:black;">
           <input type="hidden" name="_token" value="{{csrf_token()}}">
           <input type="submit" class="btn btn-primary">
        </form>
       </div>
         <a href="{{url('/showposts')}}" class="btn btn-danger" style="color:black; font-size: 30px; float: right;margin-top:-250px; margin-right:-100px;">Skip</a> 
        <!--        !-->
        <!-- Add post here link!-->
       <!--  <form method="POST" action="">
          {{csrf_field()}}
                  <h1>Post</h1>
                  <textarea  name="body" class="input-control" placeholder="What's your mind"></textarea><input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                  <input type="submit" name="post" class="btn btn-primary" value="Post">
         </form> -->
        <!--close post        !-->
      <br />
       
       </div>
    </div>
</div>
 </div> 
@endsection
