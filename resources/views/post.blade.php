@extends('layouts.app')
@section('content')

 
 
<div class="container">
 <div class="row">
  <form   method="post"   enctype="multipart/form-data" action="/posts">
   <input type="hidden" name="_token" value="{{csrf_token()}}">
         <div class="col-md-8 col-md-offset-2">
            @if ( session()->has('msg') )
                         <p class="alert alert-danger">
                                      {{ session()->get('msg') }}
                                       
                                   </p>
                                @endif
                                @if ( session()->has('video_msg') )
                         <p class="alert alert-danger">
                                      {{ session()->get('video_msg') }}
                                       
                                   </p>
                                @endif 
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: black;">
                  <p style="color:blue;font-style:italic;font-size:20px;">Post</p>
                </div>
            <img src="/uploads/avatar/{{$user->avatar}}" style="height:50px;width:50px; border-radius: 10px 10px 10px;margin-top:8px; margin-left:5px;">
                 
                     
                  <wbr>  
                  <textarea  name="body" class="form-control" style="margin-top:10px;" placeholder="Write a caption"></textarea> 

                  
                  
          <wbr>
            </div>
        </div>
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              <div class="panel panel-heading">
                   <label style="color:black;"> Choose Your Picture </label>
                 </div>
                
           <input type="file"  name="image" class="form-control" style="color:black;">
            
                    </div>
        </div>
         <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              <div class="panel panel-heading">
                   <label style="color:black;"> Choose Your  Video </label>
                 </div>
                
           <input type="file" name="video" class="form-control"  style="color:black;">
           <input type="submit" name="submit" class="btn btn-primary" style="position:absolute;
                  top:-340px; right:30px;" value="Post">
                    </div>
        </div>
            </form>
         
         <wbr>  
 

          

    </div>

</div>
@endsection
  <!--  <input type="submit" name="submit" class="btn btn-primary" style="position:absolute;
                  top:-215px; right:30px;" value="Post"> -->