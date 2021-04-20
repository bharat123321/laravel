var postId =0;
var receiver_id  =0;
$('.likey').on('click',function(event) {

		event.preventDefault();
		postId = event.target.parentNode.parentNode.dataset['postid'];
		var isLike = event.target.previousElementSibling == null;
		  receiver_id = $(this).attr('id') ;
           alert(receiver_id)

		 $.ajax({
            method :'post',
            url:urlLike,
            data:{isLike:isLike,receiver_id:receiver_id,_token:token},
            success:function(data){
            	  alert(data.result);  
              }

		 })
		 .done(function(){ 
           event.target.innerText = isLike ?'You like this post':'Like';
           
		 });
            	
		 

	 });
 
                    