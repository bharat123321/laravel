<div class="container">
 <div class="row">
        

            <div class="panel panel-default" style="width:600px;">
                
                <div class="panel-body" >
                	  @foreach($posts as $post)
                
                
                  <div class="showsearched">
               <a href="{{url('show_exibit_in_search/'.$post->id.'/')}}" style="text-decoration:none;">
             <img src="/uploads/avatar/{{$post->avatar}}" style="width:50px; height:50px; float:left; border-radius:50%; margin-top:-10px; " ><br><hr>
             
            <h3 style="margin-left:100px;margin-top:-73px;">{{strtoupper($post->firstname)}}  {{strtoupper($post->lastname)}} </h3><br>
             
            </a> 
           </div>
            
          
                  @endforeach 
              
              
                </div>
            </div>
            </div>
        </div>
          
       
   


