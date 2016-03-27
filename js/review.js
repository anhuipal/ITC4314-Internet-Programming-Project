$('document').ready(function()
{
    $("#review").validate({
        rules: {
            reviewText: {
                required: true,
            },
        },
        messages:
        {
            reviewText:{
                required: "this field is required",
            },
        },
        submitHandler: review
    });

    function review()
    {
        var data = $("#review").serialize();
        console.log(data);
        $.ajax({

            type : 'POST',
            url  : './database/review.php',
            data : data,
            beforeSend: function()
            {
                $("#error").show();
                $("#error").fadeOut();
                $("#review-submit").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Posting Review ...');
            },
            success :  function(data)
            {
                if(data==0){

                    $("#error").fadeIn(1000, function(){


                        $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Sorry review not submitted, you have already reviewed this course !</div>');

                        $("#review-submit").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Send Review');

                    });

                }
                else
                {

                    $("#error").fadeIn(1, function(){

                        $("#error").html('<div class="alert alert-success"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+'Review Sent! '+' </div>');

                        $("#review-submit").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Review Send!');




                        setTimeout(function () {
                            window.location.href = "index.php";
                        }, 2000);

                    });
                }
            }
        });
        return false;
    }


});
