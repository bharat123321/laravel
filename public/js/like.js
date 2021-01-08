 var receiver_id = '';  
    var my_id = "{{ Auth::id() }}";
    $(document).ready(function () { 

       // ajax setup form csrf token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
                 $('.like').click(function(event) {
                    
                    var isLike = event.target.previousElementSibling == null;

                    receiver_id = $(this).attr('id') ;
                        
                    $.ajax({
                type: "get",
                url: "liked/" + receiver_id, // need to create this route
                data: "",
                cache: false,
                success: function (data , status) {
                       
                }
            });
                 });
 });
