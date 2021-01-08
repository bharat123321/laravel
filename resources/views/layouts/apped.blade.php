<!--  In app.blade.php  we have done various things 
  1. top navigation all done in here like login, register, search,profile

      !-->
 
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
     
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    
     <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <style>
         /* width */
        ::-webkit-scrollbar {
            width: 7px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #a7a7a7;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #929292;
        }

        ul {
            margin: 0;
            padding: 0;
        }

        li {
            list-style: none;
        }

        .user-wrapper, .message-wrapper {
            border: 1px solid #dddddd;
            overflow-y: auto;
        }

        .user-wrapper {
            height: 600px;
        }

        .user {
            cursor: pointer;
            padding: 5px 0;
            position: relative;
        }

        .user:hover {
            background: #eeeeee;
        }

        .user:last-child {
            margin-bottom: 0;
        }

        .pending {
            position: absolute;
            left: 13px;
            top: 9px;
            background: #b600ff;
            margin: 0;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            line-height: 18px;
            padding-left: 5px;
            color: #ffffff;
            font-size: 12px;
        }

        .media-left {
            margin: 0 10px;
        }

        .media-left img {
            width: 64px;
            border-radius: 64px;
        }

        .media-body p {
            margin: 6px 0;
        }
         .message-wrapper {
            padding: 10px;
            height: 536px;
            background: white;
            border-radius:10px 10px;
        }
        .message-wrappered {
            padding: 10px;
            height: 536px;
            background: #eeeeee;
        }

        .messages .message {
            margin-bottom: 15px;
        }

        .messages .messagess{
            margin-bottom: 0;
        }

        .received, .sent {
            width: 45%;
            padding: 3px 10px;
            border-radius: 20px;
        }

        .received {
            background: blue;
            margin-left:40px;
        }

        .sent {
            background:blue;
            float: right;
            text-align: right;
        }
        


        .message p {
            margin: 5px 0;
        }

        .date {
            color: #777777;
            font-size: 12px;
        }

        .active {
            background: red;
        }

        input[type=text] {
            width: 100%;
            padding: 12px 20px;
            margin: 15px 0 0 0;
            display: inline-block;
            border-radius: 4px;
            box-sizing: border-box;
            outline: none;
            border: 1px solid #cccccc;
        }

        input[type=text]:focus {
            border: 1px solid #aaaaaa;
        }
   
       #sear {  
       
   }  
   .showsearched{
    color:blue;
    cursor: pointer;
   }
   

    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image 
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>-->
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>
                        
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                        <!-- profile image  !-->
                            <a href="/profile">  <img src="/uploads/avatar/{{Auth::user()->avatar}}" style="width:50px; height:50px; float:left; margin-left:-55px; margin-top:-20px; border-radius:50%; "></a>
                           
                            <!-- upload image in navigation bar  !-->
                            <a href="/index ">  <img src="/upload/image/home.jpg" style="width:50px; height:50px; float:center; margin-top:-22px; cursor:pointer;border-radius:20%;"></a>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="margin-top:-20px;">
                                    {{strtoupper(Auth::user()->firstname )}} <span class="caret"></span>
                                </a>
                                    
                                <ul class="dropdown-menu" role="menu">
                                  <li> <a href="{{ url('/change')}}"> <i class="fa fa-btn fa-user"></i> Change</a> </li>
                                   
                                  <li><a href="{{url('/friend_request')}}">My Requests
                                      <span style="color:green; font-weight:bold;
                                       font-size:16px">({{App\friendship::where('status', Null)->where('acceptor', Auth::user()->id)->count()}})</span></a></li>
                                  <li> <a href="{{ url('/change')}}"> <i class="fa fa-btn fa-user"></i> About Your information</a> </li>
                                  <li> <a href="{{ url('/post')}}"> <i class="fa fa-btn fa-user"></i>Post</a> </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                             
                            <!-- About search   !-->
                            
                         <div class="col-md-4">
                         <div class="form-group">
                                <form method="get" id="form-data" data-route ="/search">
                                   
                                    <input type="text" name="search"  placeholder="Search your friend name" class="submit" style="margin-left: 600px; margin-top: -20px;">
                               
 </form>
 

                                 
                            </div>
                         
                         </div> 
                          <!-- <li class="dropdown" id = "markesheet" onclick="markNotificationAsRead()">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                   role="button" aria-expanded="false">
                                    <i class="fa fa-globe fa-2x" aria-hidden="true"></i><img src="/upload/image/notification.png" style="margin-top:-40px; width: 50px"> 
                                   

                                    <span class="badge"style="background:red; position: relative; top: -35px; left:-10px">
                                  {{count(auth()->user()->unreadNotifications)}}
                                    </span>
                               </a>
                                    
                                   <ul class="dropdown-menu" role="menu" style="width:320px">
                                       <li>
                                       // <a href="{{route('markAsRead')}}" class="btn btn-link">Mark all As Read</a> -->
                                       <!--    @forelse(auth()->user()->unreadNotifications as $notification)
                    @include('layouts.Notifica.'.snake_case(class_basename($notification->type)));       
                                            @empty
                                            <a href="#">No any Notification</a>
                                          @endforelse
                                                </li>
                                   </ul>
                                </li> -->
                                 <!-- From here Messenger  -->


                                 <a href="{{url('message/')}}"  style="position: relative; left:-300px" class="btn btn-primary" >Messenger </a>


                                 <!-- To here messenger -->
                        @endif
                    </ul>
                </div>
                                            
                         

            </div>
        </nav>

        @yield('content')
    </div>
     
<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="js/like.js"></script>
 <script type="text/javascript" src="js/searched.js"></script>
 <script type="text/javascript" src="js/showsearch.js"></script>
<script type="text/javascript" src="{{asset('/js/main.js')}}"></script>
 

    <!-- Scripts --> 
     <!-- Scripts for searching --> 
     
 
<script>
    var receiver_id = '';
    var my_id = "{{ Auth::id() }}";
    $(document).ready(function () { 
        //ajax setup form csrf token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

         klkhk

                 $('.user').click(function() {
                    $('.user').removeClass('active');
                    $(this).addClass('active');
                    receiver_id = $(this).attr('id');
                    $.ajax({
                type: "get",
                url: "messaged/" + receiver_id, // need to create this route
                data: "",
                cache: false,
                success: function (data) {

                    $('#messages').html(data);
                    scrollToBottomFunc();
                    
                }
            });
                 });


        $(document).on('keyup', '.input-text input', function (e) {
            var message = $(this).val();
     // check if enter key is pressed and message is not null also receiver is selected
            if (e.keyCode == 13 && message != '' && receiver_id != '') {
                 
                $(this).val(''); // while pressed enter text box will be empty

                var datastr = "receiver_id=" + receiver_id + "&message=" + message;
                
                $.ajax({
                    type: "post",
                    url: "messaged", // need to create this post route
                    data: datastr,
                    cache: false,
                    dataType:'json',
                    success: function (data) {
                            
                    },
                    error: function (jqXHR, status, err) {
                    },
                    complete: function () {
                        scrollToBottomFunc();
                    },
                     
                });
            }
        });

        });

    function scrollToBottomFunc (){
        $('.message-wrapper').animate({
             scrollTop: $('.message-wrapper').get(0).scrollHeight},50);    }

        

       

        
    

     
</script>
</body>
</html>
