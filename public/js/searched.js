  
  var my_id = "{{ Auth::id() }}";
    $(document).ready(function () { 

       // ajax setup form csrf token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
                $(document).on('keyup', '#form-data input', function (e) {
                 var route = $('#form-data').data('route');
                 var search = $(this).val();
                    var datastr = "search=" + search;
                    
                      $.ajax({
                type: "get",
                url: route , // need to create this route
                data: datastr,
                cache: false,
                success: function (data , status) {
                        $('#showsearch').html(data);
                }
            });
                 });
 });  
