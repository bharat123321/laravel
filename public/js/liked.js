// var postId =0;
// var receiver_id  =0;
// $('.likey').on('click',function(event) {

// 		event.preventDefault();
// 		postId = event.target.parentNode.parentNode.dataset['postid'];
// 		var isLike = event.target.previousElementSibling == null;
// 		 receiver_id = $(this).attr('id') ;
           

// 		 $.ajax({
//             method :'post',
//             url:urlLike,
//             data:{isLike:isLike,receiver_id:receiver_id,_token:token},
//             success:function(data){
//             	    // $('#haha').html("Liked"+data.result);
//                        var temp = '';
                        
//                      temp = "<a href='#'> Liked " +data.result+ "</a>";
                 
//                      alert(receiver_id)
//                      alert(data.checks)
//                      if(receiver_id != data.checks){ 
//                     $('.test').html(temp);
//                 }
//                 else{
//                     $('.test').html("bharat");
//                 }
               
//               }

// 		 })
// 		 .done(function(){ 
//            event.target.innerText = isLike ?'You like this post':'Like';
           
// 		 });
            	
		 

// 	 });
 
                    