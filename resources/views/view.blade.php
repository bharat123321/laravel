<!DOCTYPE html>
  @extends('layouts.app')

@section('content')
<html>
<head>
	<title>
   <style type="text/css">
     .table_design{
         margin-left:100px;
         margin-top: 0px;
     }
   </style> 
  </title>
</head>
<body>
	 
	<div class="header">
       <img src="/uploads/avatar/{{$image->avatar}}" style="width: 350px;height: 250px;border-radius:50%; float: right; margin-right: 150px;">  </a>  
       <h2 style=" position: absolute; top:360px; right: 250px;">Profile</h2>
    	</div>
      <div >
       <table border="2" style="margin-left: 250px;">
        <h2 style="margin-left: 250px;"><b>Detail of User</b></h2>
       	<tr>
       		<th >Firstname </th>
          <th >Lastname </th>
          <th >Username </th>
          <th >Email </th>
          <th >Address </th>
          <th >Gender </th>
          <th >Country </th>
           <th >post </th>
           <th> </th>
       	</tr>
        <tr>
          <th>{{$image->firstname}}</th>
          <th>{{$image->lastname}}</th>
          <th>{{$image->username}}</th>
          <th>{{$image->email}}</th>
          <th>{{$image->address}}</th>
          <th>{{$image->gender}}</th>
          <th>{{$image->country}}</th>
          @foreach($image->post as $posted)
           <th>{{$posted->body}}</th>

          @endforeach
        </tr>
       </table>
       </div>
</body>
</html>
@endsection