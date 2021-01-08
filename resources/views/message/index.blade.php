 
<div class="message-wrapper">
         <ul class="messages">
           
          @foreach($message as $message)
             <li class="message clearfix">
              <!-- if message user_requested_id is equal to the auth id then it is sent by logged in user -->
                  <!-- <div class="{{ $message->user_requested_id == Auth::id() ?'sent':'received'}}"> -->
                      @if($message->user_requested_id == Auth::id())
             <div class ="{{ ($message->user_requested_id == Auth::id()?'sent':'null')}}"> 
                {{$message->message}}
                
                
                  
                </div> 
                
            
              @else 
              
         
              <div class ="{{ ($message->user_requested_id == Auth::id()?'null':'received')}}"> 
                    
 
                <img src="/uploads/avatar/{{$users->avatar}}" style="height:40px; width: 40px; float:left; border-radius:50%;margin-left:-55px; margin-top:9px;">    
                   <p>{{$message->message}}</p>
                   
              </div>
               
                  
              @endif

             </li> 
             @endforeach
        
          
             

         </ul>

     </div>
  

     <div class="input-text">
       <input type="text" name="message" class="submit">
           
     </div>
     
      