var postId =0;
var receiver_id  =0;
$('.likey').on('click',function(event) {

		event.preventDefault();
		postId = event.target.parentNode.parentNode.dataset['postid'];
		var isLike = event.target.previousElementSibling == null;
		 receiver_id = $(this).attr('id') ;
           
		 $.ajax({
            method :'post',
            url:urlLike,
            data:{isLike:isLike,receiver_id:receiver_id,_token:token},
            success:function(data){
            	  // $('.haha').html("Liked"+data.result);
                   
                    if(data.checks == 1){
                        if(data.result == receiver_id){
                        $('.haha').html("Liked"+data.result)
                    }
                    }
             
              }

		 })
		 .done(function(){ 
           event.target.innerText = isLike ?'You like this post':'Like';
           
		 });
            	
		 

	 });
 
                    