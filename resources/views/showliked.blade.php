@extends('layouts.app')

@section('content')
 
<div class="container">
 <div class="row">
         <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                Liked</div>

                <div class="panel-body comment-container" >
                 <a href="{{url('/showposts')}}" class="btn btn-danger">back</a>
        
    <table class="table table-striped "> 
   
  <tr><th>Name</th><th style="position:absolute;right:240px;">Liked</th>  </tr>
     @if($from_postid->count()  > 0)
    @foreach($from_postid as $post) 
  <tr>
  <td><img src="/uploads/avatar/{{$post->avatar}}" style="width:50px; height:50px;border-radius:30%;"></td>
    <td style="position:relative;right:120px;top:-15px;"><h2>{{$post->firstname }}</h2></td>
    <td style="position:relative;right:90px;"><h2>like</td></h2></tr>
      
@endforeach
@else
  <tr><td></td><td>No like yet</td>  
  @endif
</table>  
 
                              
                                
@endsection 
 
 
