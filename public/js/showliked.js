 var receiver_id = '';
    var my_id = "{{ Auth::id() }}";
    $(document).ready(function () { 

        // ajax setup form csrf token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }); 
                    
                  $('.showliked').click(function() {
                    
                    receiver_id = $(this).attr('id');
                   
                    $.ajax({
                type: "get",
                url: "showlike/"+ receiver_id, // need to create this route
                data: "",
                cache: false,
                success: function (data) {
                     
                    
                }
            });
                 });
 });
