<!DOCTYPE html> 
 <html lang="en"> 
  
 <head> 
   <meta charset="utf-8"> 
   <title>Swiper demo</title> 
   <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"> 
  
    <!-- Link Swiper's CSS --> 
   <link rel="stylesheet" href="css/swiper.min.css"> 
  
  
   <!-- Demo styles --> 
   <style> 
     html, 
     body { 
       position: relative; 
       height: 100%; 
     } 
  
     body { 
       background: #eee; 
       font-family: Helvetica Neue, Helvetica, Arial, sans-serif; 
       font-size: 14px; 
       color: #000; 
       margin: 50px; 
       padding: 0; 
     } 
  
     .swiper-container { 
       margin:10px auto;
       width: 50%; 
       height: 50%; 
     } 
  
     .swiper-slide { 
       text-align: center; 
       font-size: 18px; 
      background: #ffff;
  
       /* Center slide text vertically */ 
       display: -webkit-box; 
       display: -ms-flexbox; 
       display: -webkit-flex; 
       display: flex; 
       -webkit-box-pack: center; 
       -ms-flex-pack: center; 
       -webkit-justify-content: center; 
       justify-content: center; 
       -webkit-box-align: center; 
       -ms-flex-align: center; 
       -webkit-align-items: center; 
       align-items: center; 
     } 
       #Progress_Status { 
        width: 100%; 
        background-color: #ddd;
        position:absolute;
        top:0px;
        left:0px;
       } 
  
      #myprogressBar { 
        width: 2%; 
        height: 5px; 
        color: red;
        background-color: #4CAF50; 

      } 
   </style> 
 </head> 
  
 <body> 
   <!-- Swiper --> 
 <!--   @foreach($post->all() as $post)
    @if(Auth::user()->id == $post->user_id) 
     -->
    
   <div class="swiper-container"> 
    
     <div class="swiper-wrapper"> 
         
                
            <!--  <?php
                   $val = 1;
            foreach (explode(",", $post->image)as $images) {

                          
              ?>  -->     
                    
                    <div class="swiper-slide"> 
                       
                          

                    
                   <!--   <?php for ($i=1; $i <$post->count; $i++) { 
                      if($val == $i){
                        ?>
                    <p style="position:absolute; top:-10px;left:0px;"> 
                          
                  {{$i}}  <?php echo "/"; ?>  {{$post->count}}  -->
                  </p>  
                   <div id="Progress_Status"> 
                         <div id="myprogressBar">
                        </div> 
   
                        </div> 
                  <!-- <?php  }   
                    }
                $val++; 
                ?> -->
              <div class="carousel-item">
             <img class="d-block img-fluid" src="image_upload/{{$images}}" onclick="update()" > </div>
               
                 
                       </div>
                      
                   <!--  <?php  }
                  
               
                       ?> -->
                    
                      
                    
       
     </div> 
      
     <!-- Add Pagination --> 
   
     <div class="swiper-pagination">
      
      </div> 
      
   </div> 
  @endif
      @endforeach
   
   <!-- Swiper JS --> 
   <script src="js/swiper.min.js"></script> 
  
   <!-- Initialize Swiper --> 
   <script> 
     var swiper = new Swiper('.swiper-container', { 
       pagination: { 
         el: '.swiper-pagination', 
          
         dynamicBullets: true, 
       }, 
     }); 
   </script> 
    <script src="{{ asset('js/app.js') }}"></script>
   <script type="text/javascript">
     $(document).ready(function(){
       $('.progress').text('bharat');
       
     });
   </script>
   <script> 
function update() { 
  var element = document.getElementById("myprogressBar");    
  var width = 1; 
  var identity = setInterval(scene, 60); 
  function scene() { 
    if (width >= 100) { 
      clearInterval(identity); 
    } else { 
      width++;  
      element.style.width = width + '%';  
    } 
  } 
} 
</script> 
 </body> 
  
 </html> 
