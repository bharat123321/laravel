@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
  	 <div class="col-md-9 col-md-offset-2">
  	 	<div class="panel panel-default">
  			<div class="panel-body">
  				@if($showcomment->count()  > 0)
  				@foreach($showcomment as $showcomment)
  				    
  			   <img src="/uploads/avatar/{{$showcomment->avatar}}"  style="height:50px; width: 50px; float:left; border-radius:50%;">
  			    
  			  
  			    <h2 style="margin:auto 90px;"><b>
  			    	{{$showcomment->firstname}}{{$showcomment->lastname}}</b></h2>
  			    
  		 <h2 style="background:#99CC99;width:40%; padding:3px; border-radius: 20px;text-align: center;position: relative;left:40px;top:-10px;color:black;margin: 10 0px;">{{$showcomment->comment}}</h2>

  		 <div class="replyincomment">
  		 <a href="{{url($showcomment->id)}}" id="replytocomment" onclick="document.getElementById('reply_form').style.display='block'">Reply</a>
  		
  		 </div>
  		 
  		@endforeach
  		
  		@if($replies->count() > 0)
  		@foreach($replies as $replies)
      @if($replies->comment_id == $showcomment->id)
      <h2 style="margin:auto 110px;"><b>
              {{$replies->firstname}} {{$replies->lastname}}</b></h2>
       <img src="/uploads/avatar/{{$replies->avatar}}"  style="height:50px; width: 50px; float:left; border-radius:50%;position:relative;left:50px;top:-50px;">
             <h2 style="background:#99CC99;width:45%; padding:3px; border-radius: 20px;text-align: center;position: relative;left:110px; color:black;">{{$replies->reply}}</h2>
             @endif
             @endforeach
             @endif
  		</div>
  	</div>
  </div>
  <div id="reply_form" >
   <form  method="post" action="{{ route('replies.store') }}" >
                                   {{  csrf_field() }}
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" >
                        <input type="hidden" name="comment_id" value="{{$showcomment->id}}">
                         
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
                    @else
      <h1 style="color:skyblue">No Comment Yet</h1>
      @endif
                </div>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function(){  
         $('".replytocomment"').click(function(){  
         $("#reply_form").show();
          });
    });
</script>

@endsection