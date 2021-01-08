<style type="text/css">
  
  .manage_it{  
    /* position: relative;
     top: 400px;
     left:-100px;*/
   margin-top: 0px;
   margin-left:-20px;
     }
</style>

<!--     
     In index.blade.php we have done various things

     1. we upload profile image in big size and make comment form , reply form and like system in here

   !-->

@extends('layouts.app')

@section('content')


<div class="container">
 <div class="row">
         <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default" >
                

                <div class="panel-body comment-container" >
                    @foreach ($post as $post)

                     @if(Auth::user()->id == $post->user_id)
                      
                        <div class="panel-heading">
                       
                       <!-- user_profile!-->
                     
                     <!--  upload file so in browser in big size  !-->
                    <img src="/uploads/avatar/{{$user->avatar}}" style="width:50px; height:50px; float:left; border-radius:50%; "></div>
                    
                     <!--  Add user name in upload file  !-->
                    <h2 style="color:black;margin-top: -20px;"><b>{{strtoupper($user->firstname)}}</b> update his profile picture</h2>
                     <!-- Add Date in upload file   !-->
                   <!-- <small>{{date_format($user->created_at,'F, d,Y') }}</small><br>!-->
                   <small>{{ $post->created_at }}</small><br>
                   <div class="well">
                    <div style="margin-left:10px;">
                       
                    <h2>{{$post->body}}</h2>
                     
                 <img src="/uploads/avatar/{{$user->avatar}}"  height="50%"; width="70%";> 
                  </div><br><br>
                   <!--  like and dislike  !-->  
                   <div class="interaction">
                    <?php $check = DB::table('likes')->where('post_id',$post->id)->where('user_id',Auth::user()->id)->first();
                           if($check == ''){ 

                     ?>
                    <a href="{{url('showliked/'.$post->id.'/')}}"   style="color:blue; position:relative;top:-40px"><span class="badge"> Liked {{$post->likes->count()}}</span> </a> <br>
                    <a href="{{url('like/'.$post->id.'/')}}"><span class="btn btn-primary" style="position:relative;top:-30px">Like</span>
                    </a>
                      <?php } else{ ?>
                     <a href="{{url('showliked/'.$post->id.'/')}}"><span style="position:relative;top:-30px">You liked this and {{$post->likes->count()}} others</span>  </a> <br>                                                                                                                     
                <?php } ?>
                 <a href="{{url('/dislike/'.$post->id.'/')}}"><span  style="position:relative;top:-30px" class="btn btn-danger">Dislike</span>

                    </a>
                    <i aria-hidden="true"><span  style="position:relative;top:-30px" class="btn btn-primary">Comment ({{$post->comments->count()}})</span></i>

                    <br><br>
                  </div>
                    <div class="reply-form">
                                    
                                    <!-- Dynamic user comment form  !-->
                                     <form id="reply-form" method="post" action="{{ route('comments.store') }}" >
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
                             </div>
                     </div>
                   @endif 
                   @endforeach
                 <!-- for acceptor -->
                       @foreach($friends as $friends)
                    <!--  upload file so in browser in big size  !-->
                      @if(Auth::user()->id == $friends->acceptor)
                    <div class="panel-heading">
                    <img src="/uploads/avatar/{{$friends->avatar}}" style="width:50px; height:50px; float:left; border-radius:50%; ">
                    </div>
                     <!--  Add user name in upload file  !-->
                    <h2 style="color:black;margin-top: -20px;"><b>{{strtoupper($friends->firstname)}}</b> update his profile picture</h2>
                     <!-- Add Date in upload file   !-->
                   <!-- <small>{{date_format($user->created_at,'F, d,Y') }}</small><br>!-->
                   <small>{{ $friends->created_at}}</small><br>
                   <div class="well">
                    <div style="margin-left:10px;">
                       
                      
                    <h2>{{$friends->body}}</h2> 
                      
                 <img src="/uploads/avatar/{{$friends->avatar}}"  height="50%"; width="70%";> 
                  </div><br>
                   <!--  like and dislike  !-->  
                   <div class="interaction">
                    @if($post->id = $friends->post_id_1_U)
                    <?php $check = DB::table('likes')->where('post_id',$friends->post_id_1_U)->where('user_id',Auth::user()->id)->first();
                           if($check == false){ 
                     ?>
                  <a href="{{url('showliked/'.$post->id.'/')}}" style="color:blue; position:relative;top:-10px"> Liked by  {{  $countlike->where(['post_id' => $friends->post_id_1_U])->get()->count() }}</a>  <br>
                   <a href="{{url('/like/'.$post->id.'/')}}"><span class="btn btn-primary"> Like  </span></a>
                                                     
               <?php } else{ ?>
                   <a href="{{url('showliked/'.$post->id.'/')}}" style="color:darkblue; position:relative;top:-10px"> You liked this post and {{$post->likes()->where(['like' => '1'])->count()}} others </a>  <br>                                  
                <?php } ?>

                  @else
                   <a href="{{url('/like/'.$friends->post_id_1_U.'/')}}"><span class="btn btn-primary"> Like   {{$post->likes->count()}}
                 </span></a>
                     @endif

                    <a href="{{url('/dislike/'.$friends->post_id_1_U.'/')}}" ><span class="btn btn-danger">Dislike</span>
                       
                    </a>
                    </a>
                         
                       <i class="btn btn-primary" aria-hidden="true">Comment  (
                      {{ $post->comments()->where(['statues'=>'1'])->count() }})</i>
                    <br> 
                    <!-- Dynamic frend comment form  !-->
                                     <form id="reply-form" method="post" action="{{ route('comments.store') }}" >
                                   {{  csrf_field() }}
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" >
                         <input type="hidden" name="firstname" value="{{$friends->firstname}}">
                         <input type="hidden" name="lastname" value="{{$friends->lastname}}">
                         <input type="hidden" name="post_id" value="{{ $post->id }}" >
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
                     </div>
                      </div>
            @endif
                   @if(Auth::user()->id == $friends->user_requested)
                    <div class="panel-heading">
                    <img src="/uploads/avatar/{{$friends->avatar}}" style="width:50px; height:50px; float:left; border-radius:50%; ">
                    </div>
                     <!--  Add user name in upload file  !-->
                    <h2 style="color:black;margin-top: -20px;"><b>{{strtoupper($friends->firstname)}}</b> update his profile picture</h2>
                     <!-- Add Date in upload file   !-->
                   <!-- <small>{{date_format($user->created_at,'F, d,Y') }}</small><br>!-->
                   <small>{{ $post->created_at->toFormattedDateString()}}</small><br>
                   <div class="well">
                    <div style="margin-left:10px;">
                         
                           
                         
                    <h2>{{$friends->body}}</h2>
                     
                     
                 <img src="/uploads/avatar/{{$friends->avatar}}"  height="50%"; width="70%";> 
                  </div><br>
                   <!--  like and dislike  !-->  
                   <div class="interaction">
                    @if($post->id = $friends->post_id_2_A)

                    <?php $check = DB::table('likes')->where('post_id',$post->id)->where('user_id',Auth::user()->id)->first();
                           if($check == ''){ 
                     ?>
                       <a href="{{url('showliked/'.$post->id.'/')}}" style="color:blue; position:relative;top:-10px">Liked {{$post->likes()->where(['like' => '1'])->count()}} </a>    <br>
                 <a href="{{url('/like/'.$friends->post_id_2_A.'/')}}"><span class="btn btn-primary"> Like 
                 </span></a>
                 <?php } else{ ?>
                   <a href="{{url('showliked/'.$post->id.'/')}}" style="color:darkblue; position:relative;top:-10px"> You liked this post and {{$post->likes()->where(['like' => '1'])->count()}} others </a>  <br>                                  
                <?php } ?>

                  @else
                   <a href="{{url('/like/'.$friends->post_id_2_A.'/')}}"><span class="btn btn-primary"> Like   {{$post->likes->count()}}
                 </span></a>
                     @endif
                    </a><a href="{{url('/dislike/'.$post->id.'/')}}"><span class="btn btn-danger">Dislike</span>

                    </a>
                     <a class="btn btn-primary" href="{{url('comment/'.$friends->post_id_2_A)}}" aria-hidden="true">Comment ({{ $post->comments()->where(['statues'=>'1'])->count() }})</a>

                    <br> 
                    <!-- Dynamic frend comment form  !-->
                                     <form id="reply-form" method="post" action="{{ route('comments.store') }}" >
                                   {{  csrf_field() }}
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" >
                          <input type="hidden" name="firstname" value="{{$friends->firstname}}">
                         <input type="hidden" name="lastname" value="{{$friends->lastname}}">
                         <input type="hidden" name="post_id" value="{{ $post->id }}" >
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
                     </div>
                      </div>
                      @endif
          
                  @endforeach
                    
                 </div>
                   
                   
      </div>
          </div>
            </div>
        </div>
        
     </div>
      
 
             
                    <!--  close like and dislike  !-->
                             <!--  comment form   !-->

   <div class="row">
         <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Comments</div>

                <div class="panel-body comment-container" >
                    
                    @foreach($comments as $comment) 
                        <div class="well">
                            <i><b>Comment by {{ $comment->user->firstname }}{{$comment->user->lastname}} to {{ $comment->firstname }} </b></i>&nbsp;&nbsp;
                            <span> {{ $comment->comment }} </span><br>
                            <small>{{date_format($comment->created_at,'F, d,Y') }}</small>
                            <div style="margin-left:10px;">
                              
                                <div class="reply-form">
                                    
                                    <!-- Dynamic Reply form  !-->
                                     <form id="reply-form" method="post" action="{{ route('replies.store') }}" >
                                   {{  csrf_field() }}
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" >
                        <input type="hidden" name="comment_id" value="{{$comment->id}}">
                         
                        <div class="row" style="padding: 10px;">
                            <div class="form-group">
                                <textarea class="form-control" name="reply" placeholder="Write something from your heart..!"></textarea>
                            </div>
                        </div>
                        <div class="row" style="padding: 0 10px 0 10px;">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-lg"  value="Reply">
                                
                            </div>
                        </div>
                    </form>   
                                </div>
                                @foreach($comment->replies as $rep)
                                  
                                        <div class="well">
                                            <i><b> {{ $rep->firstname }} </b></i>&nbsp;&nbsp;
                                            <span> {{ $rep->reply }} </span>
                              <div style="margin-left:10px;">
         <a rname="{{ Auth::user()->name }}" rid="{{ $comment->id }}" style="cursor: pointer;"class="reply-to-reply" token="{{ csrf_token() }}">Reply</a>&nbsp;<a did="{{ $rep->id }}" class="delete-reply" token="{{ csrf_token() }}" >Delete</a>
                                            </div>
                                            <div class="reply-to-reply-form">            
                                                
                 @endforeach
                                           </div>
                                      </div>
                                   
                                @endforeach
                              </div>
                        </div>

                             @foreach($comments as $comment2)
                     @if(Auth::user()->id == $comment2->acceptor)
                        <div class="well">
                            <i><b> {{ $comment2->firstname }}{{$comment2->lastname}} </b></i>&nbsp;&nbsp;
                            <span> {{ $comment2->comment }} </span><br>
                            <small>{{date_format($comment2->created_at,'F, d,Y') }}</small>
                            <div style="margin-left:10px;">
                              
                                <div class="reply-form">
                                    
                                    <!-- Dynamic Reply form  !-->
                                     <form id="reply-form" method="post" action="{{ route('replies.store') }}" >
                                   {{  csrf_field() }}
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" >
                        <input type="hidden" name="comment_id" value="{{$comment->id}}">
                         
                        <div class="row" style="padding: 10px;">
                            <div class="form-group">
                                <textarea class="form-control" name="reply" placeholder="Write something from your heart..!"></textarea>
                            </div>
                        </div>
                        <div class="row" style="padding: 0 10px 0 10px;">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-lg"  value="Reply">
                                
                            </div>
                        </div>
                    </form>
                                    
                                </div>
                                @foreach($comment->replies as $rep)
                                     @if($comment->id === $rep->comment_id)
                                        <div class="well">
                                            <i><b> {{ $rep->firstname }} </b></i>&nbsp;&nbsp;
                                            <span> {{ $rep->reply }} </span>
                              <div style="margin-left:10px;">
         <a rname="{{ Auth::user()->name }}" rid="{{ $comment->id }}" style="cursor: pointer;"class="reply-to-reply" token="{{ csrf_token() }}">Reply</a>&nbsp;<a did="{{ $rep->id }}" class="delete-reply" token="{{ csrf_token() }}" >Delete</a>
                                            </div>
                                            <div class="reply-to-reply-form">            
                                                @endif
                 @endforeach
                                           </div>
                                      </div>
                                    @endif 
                                @endforeach
                              </div>
                        </div>

                      </div>
            </div> 
        </div>
    </div>

  
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
     
    <script>
      var token = '{{ Session::token() }}';
      
    </script>
 
@endsection