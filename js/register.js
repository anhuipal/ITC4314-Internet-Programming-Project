$('document').ready(function()
{
    /* validation */
    $("#register-form").validate({
        rules:
        {
            id: {
                required: true,
                minlength: 6,
                maxlength:6
            },
            password: {
                required: true,
                minlength: 8,
                maxlength: 15
            },
            cpassword: {
                required: true,
                equalTo: '#password'
            },
            email : {
                required: true,
                email: true
            },
            fName : {
                required: true
            },
            lName : {
                required: true
            },
        },
        messages:
        {
            id :{
                minlength: "please provide 6 digits",
                maxlength: "please provide 6 digits"
            },
            password:{
                minlength: "password at least have 8 characters"
            },
        },
        submitHandler: submitForm
    });

    function submitForm()
    {
        var data = $("#register-form").serialize();

        $.ajax({

            type : 'POST',
            url  : './database/register.php',
            data : data,
            beforeSend: function()
            {
                $("#error").fadeOut();
                $("#btn-submit").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
            },
            success :  function(data)
            {
                if(data==1){

                    $("#error").fadeIn(1000, function(){


                        $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Sorry id already taken !</div>');

                        $("#btn-submit").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Account');

                    });

                }
                else if(data=="registered")
                {

                    $("#error").fadeIn(1000, function(){

                        $("#error").html('<div class="alert alert-success"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+'Registered'+' !</div>');

                        $("#btn-submit").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Account Created');

                        setTimeout(function () {
                            window.location.href = "index.php";
                        }, 2000);



                    });
                }
                else{

                    $("#error").fadeIn(1000, function(){

                        $("#error").html('<div class="alert alert-danger"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+'Error'+' !</div>');

                        $("#btn-submit").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Account');

                    });

                }
            }
        });
        return false;
    }
    /* form submit */

});