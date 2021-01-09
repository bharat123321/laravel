<!--  This is the main index file that user will be see on the webpage -->
 @extends('layouts.app')
 @section('content')


 <!-- Add stories -->
 <?php $user = Auth::user(); 
                ?>
               
    <div class="container">
<div class="panel panel-default" style="margin-top:-20px;">
<?php $user = Auth::user(); 
                ?>
                 @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                            @else
<!-- it is used for size of panel -->
     <div class="panel-body" style="margin-top:-40px;" >
 <div class="panel-heading">
 <div style="border:1px solid gray; width:80px; height:80px; position:relative; top:20px;   margin-bottom:0px;  border-radius:50px;">
<a href="#" style="width:auto;" onclick="document.getElementById('id01').style.display='block'"> <img src="/uploads/avatar/{{$user->avatar}}"class="img-thumbnail"  style="width:80px; height:80px;  border-radius:50%; margin-top:-12px; "></a></div> 
<h4 style="position:relative; top:20px; ">Add to story</h4>
                 
</div>
  </div>
 </div>
 <!-- user name fetch -->
    
 
 @foreach($poststory as $poststory)
    
 @if($poststory->user_id == Auth::user()->id )
   <!-- story body -->
   
  @if($poststory->body !='')
<h2 style="border:1px solid gray; width:120px; height: 120px;position:absolute;top:65px;left:890px;border-radius:10px; text-align:center;" class="well">{{$poststory->body}}</h2>
<small style="width:100px; height:100px;position:relative;">{{ $poststory->formattedCreateDate() }}</small>
<img src="/uploads/avatar/{{$user->avatar}}" style="width:40px; height:40px;position:relative;left:680px;top:-200px;border-radius:50%;margin: auto -20px; padding:auto; ">
@endif
 <a href="/story/{{$poststory->id}}"> 
 
<!-- story image -->
   @if($poststory->image != '')
   <img src="/story_upload/images/{{ $poststory->image }}"  style="border:1px solid gray; width:120px; height: 120px;position:relative; top:-100px; left:140px;  margin:auto 0px; border-radius:10px; ">
  
  
   <!-- story top profile -->

 <img src="/uploads/avatar/{{$user->avatar}}" style="width:40px; height:40px;position:relative;left:40px;top:-200px;border-radius:50%;margin: auto -20px; padding:auto; ">
  @endif
  
 
</a>
 
      <!-- <h3 style="position:scroll;top:-230px;left:150px;color:blue;border-radius:10%;width:90px; height:40px;padding:5px;margin:auto 5px;">{{$user->firstname}}</h3> -->
  @endif
    @endforeach
    

  <!--  -->
  @foreach($friendstory as $friendstory)
    @if($user->id == $friendstory->acceptor)
    
     <a href="/story/{{$friendstory->id}}"> 
    @if($friendstory->id !='')
  <img src="/story_upload/images/{{$friendstory->image }}"  style="border:1px solid gray; width:120px; height: 120px;position: absolute; top:85px;  margin:auto 142px; border-radius:10px; ">  </a>
  <img src="/uploads/avatar/{{$friendstory->avatar}}" style="width:40px; height:40px;position:relative;left:105px;top:-198px;border-radius:50%;margin: auto 41px; padding:auto; ">
  @endif
 @endif
   
     @if ($user->id == $friendstory->user_requested)
      @if($friendstory->id != '')
      <a href="/story/{{$friendstory->id}}" style="width:100px;"> 
        @if($friendstory->acceptor != "")
       <h2 style="border:1px solid gray; width:120px; height: 120px;position: absolute; top:185px;    border-radius:10px;"> {{$friendstory->firstname}}  {{ $friendstory->id }}</h2>@endif
        @if($friendstory->image != '')
      <img src="/story_upload/images/{{ $friendstory->image }}"  style="border:1px solid gray; width:120px; height: 120px;position: absolute; top:85px;  margin:auto 142px; border-radius:10px; ">
      @endif</a>
      <img src="/uploads/avatar/{{$friendstory->avatar}}" style="width:40px; height:40px;position:relative;left:105px;top:-198px;border-radius:50%;margin: auto 41px; padding:auto; ">
       @endif
     @endif
  @endforeach
 </div>
  
  <!-- <div id="story_fetch" class="modal">
 <div class="modal-content animate">  
 <div class="imgcontainer">
  <div class="panel panel-default">
         
          <a href="/story/{{$poststory->id}}">  <img src="/uploads/image/{{$poststory->image}}" style="width:60%; height: 60%; float:center;position: relative;right:5%;border-radius:20%;">
            </a>   </div>
     <span onclick="document.getElementById('story_fetch').style.display='none'" class="close" title="Close Modal" style="position: relative;right:20px;margin:0px;">&times;</span>
     </div> 
    </div>
</div> -->
  


<!-- From here to index -->

 <div class="container">
  <div class="row">
 <!-- Add post -->
         <div class="col-md-6" style="position: absolute;left:0px top=0px;margin: -20px 100px ;">

            <div class="panel panel-default" style="margin:-10px;" >
                <?php $user = Auth::user(); 
                ?>
                
                <div class="panel-body comment-container" >
                    @foreach ($post as $post)
                     
                      
                        <?php if(Auth::user()->id == $post->user_id) {  ?>
                        <div class="panel-heading">
                       
                    <img src="/uploads/avatar/{{$user->avatar}}" style="width:50px; height:50px; float:left; border-radius:50%; margin-top:-20px; "></div>
                     
                  <h2 style="color:black;margin-top: -20px;"><b>{{strtoupper($user->firstname)}}</b></h2>
                  <!-- <small>{{date("j  F Y, \a\\t g.i a",strtotime($post->created_at))}}</small> -->
                 <!-- <small> {{date('F j, Y', strtotime($post->created_at))}}
                                          at {{date('H: i', strtotime($post->created_at))}}</small> -->
                  <span class="date">{{ $post->formattedCreatedDate() }}</span>
                   <div class="well">

                    <div style="margin-left:10px;">
                       
                    <h2>{{$post->body}}</h2>
                    
                   @if($post->image != '')
                 <img src="/uploads/image/{{$post->image}}"  height="50%"; width="70%";> 

    @endif
    @if($post->video != '')
         <video width="620" height="540" controls autoplay loop>  
  <source src="/uploads/video/{{$post->video}}" type="video/mp4">  
    
</video> 
@endif          
        </div>  
        </div>
        <!--  like and dislike  !-->
        
                   <div class="post" data-postid ="{{$post->id}}"> 
                   <div class="interaction">
                   
                    <?php   $check = DB::table('likes')->where('post_id',$post->id)->where('user_id',Auth::user()->id)->first();

                           if($check == ''){ 

                     ?>
                     <div class="test">
                       
                     </div>
               <a  href="{{url('showlike/'.$post->id.'/')}}" id="haha" class="badge" style="position:relative;top:-45px;" >   </a>
     <a href="{{url('showlike/'.$post->id.'/')}}"     style="color:blue; position:relative;top:-43px; text-decoration: none"><span class="badge"> Liked {{$countlike->where('post_id',$post->id)->count()}}</span> </a>  
        <br>
       
             <a href="#" class="likey" id="{{$post->id}}"style="position: relative;top:-30px;text-decoration: none;"><span  class="btn btn-primary" >Like</span> </a> 

  <?php } else{ ?>
                   


                 <a  href="{{url('showlike/'.$post->id.'/')}}"><span class="badge" style="position:relative;top:-45px;" >Liked {{$post->likes->count()}} </span></a> <br> 
                 <a href="#" class="likey" id="{{$post->id}}"><span  class="btn btn-primary" style="position: relative;top:-30px;">You like this post</span> </a>                                                                                                          
                <?php } ?>
                 <a href="{{url('/dislike/'.$post->id.'/')}}"><span  style="position:relative;top:-30px; " class="btn btn-danger">Dislike</span></a>
               
                    <a href="{{url('/comment/'.$post->id)}}"><span  style="position:relative;top:-30px; " class="btn btn-primary">Comment ({{$post->comment->count()}})</span></a>
                      <!--  // Get the total number of views -->
                     <a href="{{url('postview/'.$post->id.'/')}}">{{$post->postview->count()}}</a> ;
                    <br><br>
                  </div>
                   
                                    
                                    <!-- Dynamic user comment form  !-->
                                     <form   method="post" action="{{ route('comments.store') }}" >
                                   {{  csrf_field() }}
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" >
                         <input type="hidden" name="firstname" value="{{$post->user->firstname}}">
                         <input type="hidden" name="lastname" value="{{$post->user->lastname}}">
                        <input type="hidden" name="post_id" value="{{ $post->id }}" > 
                         
                        <div class="row" style="padding: 10px;">
                            <div class="form-group">
                              <span style="position:relative;top:-30px">   <textarea class="form-control" name="comment" placeholder="Write something from your heart..!"></textarea></span>
                            </div>
                        </div>
                        <div class="row" style="padding: 0 10px 0 10px;">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-lg" style="position:relative;top:-30px"  value="Comment">
                                
                            </div>
                        </div>
                    </form>
                              
                     

    
      <hr>
     <?php } else { 
  
     }
 ?>
  
@endforeach
   

              @foreach($friends as $friends)
              
                    <!--  upload file so in browser in big size  !-->
                    
                      @if($friends->body != '' || $friends->image != '' || $friends->video != '')
                       
                       @if(Auth::user()->id == $friends->acceptor)
                    <img src="/uploads/avatar/{{$friends->avatar}}" style="width:50px; height:50px; float:left; border-radius:50%;margin-top:-20px; margin-left:10px; ">
                   
                     <!--  Add user name in upload file  !-->
                    <h2 style="color:black;margin-top:-10px;"><b>{{strtoupper($friends->firstname)}}</b></h2>
                     <!-- Add Date in upload file   !-->
                   <!-- <small>{{date_format($user->created_at,'F, d,Y') }}</small><br>!-->
                   <small>{{ $friends->created_at}}</small><br>
                   <div class="well">
                    <div style="margin-left:10px;">
                       
                      
                    <h2>{{$friends->body}}</h2> 
                      @if($friends->image != '')
                 <img src="/uploads/image/{{$friends->image}}"  height="50%"; width="70%";> 
                @endif
                 @if($friends->video != '')
         <video width="620" height="540" controls autoplay loop>  
  <source src="/uploads/video/{{$friends->video}}" type="video/mp4">  
    
</video> 
@endif   
                  </div><br>
              </div>
               <!--  like and dislike  !-->  

                   <div class="interaction">
                   
                    @if($post->id = $friends->id)

                    <?php $check = DB::table('likes')->where('post_id',$friends->id)->where('user_id',Auth::user()->id)->first();
                           if($check == false){ 
                     ?>
                   <a href="{{url('showlike/'.$friends->id.'/')}}" style="color:blue; position:relative;top:-10px"> Liked by {{$countlike->where('post_id',$friends->id)->count()}} </a>  <br>
            <li class="like" id="{{$friends->id}}"><span class="btn btn-primary"> Like  </span></li>
                                                     
               <?php } else{ ?>
                 
                    <a href="{{url('showlike/'.$friends->id.'/')}}" style=" position:relative;top:-35px"><span class="badge"> {{ Auth::user()->likes()->where('post_id', $friends->id)->first()->like== 1 ? 'You Liked This Post' : 'Like' }} {{$countlike->where('post_id',$friends->id)->count()}} </span>  </a>  <br>                                  
                <?php } ?>

                  @else
                   <a href="{{url('/like/'.$friends->id.'/')}}"><span class="btn btn-primary"> Like   {{$post->likes->count()}}
                 </span></a>
                     @endif

                    <a href="{{url('/dislike/'.$friends->id.'/')}}" ><span class="btn btn-danger" style="position:relative;top:-35px;left:60px;">Dislike</span>
                       
                    </a>
                    
                     <a class="btn btn-primary" href="{{url('comment/'.$friends->id)}}" aria-hidden="true"  style="color:darkblue; position:relative;top:-35px;left:70px;">Comment ({{$post->comment->count()}}) </a>
                         
                       
                    <br> 
                </div>
                    <!-- Dynamic frend comment form  !-->
                                     <form   method="post" action="{{ route('comments.store') }}" >
                                   {{  csrf_field() }}
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" >
                         <input type="hidden" name="firstname" value="{{$friends->firstname}}">
                         <input type="hidden" name="lastname" value="{{$friends->lastname}}">
                         <input type="hidden" name="post_id" value="{{ $friends->id }}" >
                        <div class="row" style="padding: 10px;">
                            <div class="form-group">
                                <textarea class="form-control" name="comment" placeholder="Write something from your heart..!"></textarea>
                            </div>
                        </div>
                        <div class="row" style="padding: 0 10px 0 10px;">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-lg"  value="Comment">
                                
                            </div>
                        </div>
                    </form>
                  
                    @endif 
                       
             
            

                   @if (Auth::user()->id == $friends->user_requested)
                    <div class="panel-heading">
                    <img src="/uploads/avatar/{{$friends->avatar}}" style="width:50px; height:50px; float:left; border-radius:50%; ">
                    </div>
                     <!--  Add user name in upload file  !-->
                    <h2 style="color:black;margin-top: -20px;"><b>{{strtoupper($friends->firstname)}}</b></h2>
                     <!-- Add Date in upload file   !-->
                   
                   <div class="well">
                    <div style="margin-left:10px;">
                    
                <h2>{{$friends->body}}</h2> 
                      @if($friends->image != '')
                 <img src="/uploads/image/{{$friends->image}}"  height="50%"; width="70%";> 
                @endif
                 @if($friends->video != '')
         <video width="620" height="540" controls autoplay loop>  
  <source src="/uploads/video/{{$friends->video}}" type="video/mp4">  
    
</video> 
@endif   
                  </div>
                   </div>
                  <br>
                   <!--  like and dislike  !-->  
                     <div class="interaction">
                       
                    @if($post->id = $friends->acceptor)

                    <?php $check = DB::table('likes')->where('post_id',$friends->id)->where('user_id',Auth::user()->id)->first();
                           if($check == ''){ 
                     ?>
                    <a href="{{url('showlike/'.$friends->id.'/')}}"><span class="badge" style="position:relative;top:-40px;background-color: black; color:white;" >Liked {{$countlike->where('post_id',$friends->id)->count()}}</span> </a>    <br>
              
                 <li class="like" id="{{$friends->id}}"><span class="btn btn-primary" style="position: relative;top:-30px;"> Like 
                 </span></li>  
                 <?php } else{ ?>
         <a href="{{url('showlike/'.$friends->id.'/')}}" style="color:darkblue; position:relative;top:-40px"> <span class="badge">{{ Auth::user()->likes()->where('post_id', $friends->id)->first()->like== 1 ? 'You Liked This Post' : 'Like' }} {{$countlike->where('post_id',$friends->id)->count()}} </span></a>  <br>                                  
                <?php } ?>

                  @else
                   <a href="{{url('/like/'.$friends->id.'/')}}"><span class="btn btn-primary"> Like   {{$countlike->where('post_id',$friends->id)->count()}}
                 </span></a>
                     @endif
                    </a><a href="{{url('/dislike/'.$friends->id.'/')}}"  style="color:darkblue; position:relative;top:-30px"><span class="btn btn-danger">Dislike</span>
 </a>
                     
                          <?php $checkComment =  DB::table('comments')->where('post_id',$friends->id)->where('user_id',Auth::user()->id)->first();
                           if($checkComment == ''){?>
                     <a class="btn btn-primary" href="{{url('comment/'.$friends->id)}}" aria-hidden="true"  style="color:darkblue; position:relative;top:-30px">Comment({{$post->comment->count()}}) </a>
                   <?php } else{?>  
                     <a class="btn btn-primary" href="{{url('comment/'.$friends->id)}}" aria-hidden="true"  style="color:darkblue; position:relative;top:-30px">Comment {{$countComment->where('post_id',$friends->id)->count()}} </a>
                 <?php  }?>

                    <br> 
                </div>
                    <!-- Dynamic frend comment form  !-->
                                     <form   method="post" action="{{ route('comments.store') }}" >
                                   {{  csrf_field() }}
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" >
                          <input type="hidden" name="firstname" value="{{$friends->firstname}}">
                         <input type="hidden" name="lastname" value="{{$friends->lastname}}">
                         <input type="hidden" name="post_id" value="{{ $friends->id }}" >
                        <div class="row" style="padding: 10px;">
                            <div class="form-group">
                                <textarea class="form-control" name="comment" placeholder="Write something from your heart..!"></textarea>
                            </div>
                        </div>
                        <div class="row" style="padding: 0 10px 0 10px;">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-lg"  value="Comment">
                                
                            </div>
                        </div>
                    </form>
                      
                      
                   @endif
                  
               <hr>
               
                
           @endif
           @endforeach
@endif
        
</div>
 </div>

 
    </div>
</div>
 </div>
</div>

 <div class="col-md-4"id="showsearch" style="position: fixed; left:780px; top:80px; ">
      
 </div>
 <div id="id01" class="modal">
  
  <form class="modal-content animate" method="post" enctype="multipart/form-data" action="/story_uploads">
  	 {{ csrf_field() }}
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
       <h4>Choose the file</h4>
    </div>

    <div class="container">
   <div class="row">
  <form   method="post"   enctype="multipart/form-data" action="/story_uploads">
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
                  <p style="color:blue;font-style:italic;font-size:20px;">Please Upload in Story</p>
                </div>
            <img src="/uploads/avatar/{{$user->avatar}}" style="height:50px;width:50px; border-radius: 10px 10px 10px;margin-top:8px; margin-left:5px;">
                 
                     
                  <wbr>  
                  <textarea  name="body" class="form-control" style="margin-top:10px;" placeholder="Write a story"></textarea> 

                  
                  
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
                  top:-340px; right:30px;" value="Upload">
                    </div>
        </div>
            </form>
         
         <wbr>  
 

          

    </div>
       </div>
     
  </form>

</div>
<!-- story fetch -->

 <script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>  
 
  
  <script type="text/javascript">
    
    var token = '{{Session::token()}}';
    var urlLike = "{{url('liked')}}" ;
  </script>
 @endsection
