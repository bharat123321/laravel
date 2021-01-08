@extends('layouts.app')
@section('content')
 
   
 <div class="col-md-10 col-md-offset-1">
  <div class="panel panel-default">
  	 
               <img src="/story_upload/images/{{$posted->image}}" style="width:40%; height: 40%; float:center;position: relative;left:25%;border-radius:20%; padding:10px;">
             
              </div>
          </div>
        <!--  like and dislike  !--> 
                   <div class="post" data-postid ="{{$posted->id}}"> 
                   <div class="interaction">
                   
                    <?php $check = DB::table('likes')->where('post_id',$posted->id)->where('user_id',Auth::user()->id)->first();
                           if($check == ''){ 

                     ?>
                    <a href="{{url('showlike/'.$posted->id.'/')}}"  style="color:blue; position:relative;top:-43px"><span class="badge"> Liked {{$posted->likes->count()}}</span> </a> <br>
                    
    
                 
                      
  <?php } else{ ?>
                 
                 <a  href="{{url('showlike/'.$posted->id.'/')}}"><span class="badge" style="position:relative;top:-40px;background-color: black; color:white;" > {{ Auth::user()->likes()->where('post_id', $posted->id)->first()->like== 1 ? 'You Liked This Post' : 'Like' }} {{$posted->likes->count()}} others</span></a> <br>                                                                                                                      
                <?php } ?>
                 <a href="{{url('/dislike/'.$posted->id.'/')}}"><span  style="position:relative;top:-30px" class="btn btn-danger">Dislike</span>

                    </a>
               
                    <i aria-hidden="true"><span  style="position:relative;top:-30px" class="btn btn-primary">Comment ({{$posted->comments->count()}})</span></i>

                    <br><br>
                  </div>
                   
                                    
                                    <!-- Dynamic user comment form  !-->
                                     <form   method="post" action="{{ route('comments.store') }}" >
                                   {{  csrf_field() }}
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" >
                         <input type="hidden" name="firstname" value="{{$posted->user->firstname}}">
                         <input type="hidden" name="lastname" value="{{$posted->user->lastname}}">
                        <input type="hidden" name="post_id" value="{{ $posted->id }}" > 
                         
                        <div class="row" style="padding: 10px;">
                            <div class="form-group">
                              <span style="position:relative;top:10px; left:200px;">   <textarea class="text-control" name="comment" placeholder="Write something from your heart..!"></textarea></span>
                            </div>
                        </div>
                        <div class="row" style="padding: 0 10px 0 10px;">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-lg" style="position:relative;top:5px; left:200px;"  value="Comment">
                                
                            </div>
                        </div>
                    </form>
     
@endsection