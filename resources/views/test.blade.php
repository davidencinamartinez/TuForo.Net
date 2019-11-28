<!DOCTYPE html>
<html>
<head>
    <title>Laravel Ajax Validation Example</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
</head>
<body>


<div class="container">
    <h2>Laravel Ajax Validation</h2>


    <div class="alert alert-danger print-error-msg" style="display:none">
        <ul></ul>
    </div>


    <form>
        {{ csrf_field() }}
        <div class="form-group">
            <label>First Name:</label>
            <input type="text" name="first_name" class="form-control" placeholder="First Name">
        </div>


        <div class="form-group">
            <strong>Email:</strong>
            <input type="text" name="email" class="form-control" placeholder="Email">
        </div>



        <div class="form-group">
            <button class="btn btn-success btn-submit">Submit</button>
        </div>
    </form>
</div>


<script type="text/javascript">


    $(document).ready(function() {
        $(".btn-submit").click(function(e){
            e.preventDefault();


            var _token = $("input[name='_token']").val();
            var first_name = $("input[name='first_name']").val();
            var email = $("input[name='email']").val();


            $.ajax({
                url: "/test",
                type:'POST',
                data: {_token:_token, first_name:first_name, email:email},
                success: function(data) {
                    if($.isEmptyObject(data.error)){
                        alert(data.success);
                    }else{
                        printErrorMsg(data.error);
                    }
                }
            });


        }); 


        function printErrorMsg (msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display','block');
            $.each( msg, function( key, value ) {
                $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            });
        }
    });


</script>


</body>
</html>