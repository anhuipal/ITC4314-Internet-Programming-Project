$('document').ready(function()
{
    $("#src-courses").validate({
        rules: {
            search: {
                required: true,
            },
            searchBy:{
              required: true,
            },
        },
        messages:
        {
            search :{
                required: "this field is required",
            },
            searchBy :{
                required: "please select an option",
            },
        },
        submitHandler: src
    });

    function src()
    {
        var data = $("#src-courses").serialize();
        console.log(data);
        $.ajax({

            type : 'POST',
            url  : './database/searchCourses.php',
            data : data,
            beforeSend: function()
            {
                $("#error").show();
                $("#error").fadeOut();
                $("#btn-submit").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Searching ...');
            },
            success :  function(data)
            {
                if(data==1){

                    $("#error").fadeIn(1000, function(){


                        $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Sorry course not found !</div>');

                        $("#btn-submit").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Search');

                    });

                }
                else /*if(data=="found")*/
                {
                    console.log(data);
                    $('#results').show();
                    $('#h1-review').show();
                    $('#wrt-reviews').show();
                    $('#results').html(data);
                    $("#error").fadeIn(1, function(){

                        $("#error").html('<div class="alert alert-success"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+'Course Found! '+' </div>');

                        $("#btn-submit").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Course Found!');

                        setTimeout(function () {
                            $("#error").fadeOut();
                        }, 3000);

                    });
                }
                    $('#searchBody').hide();
                    console.log(data);
                    $('#results').html(data);
                    $('#searchAgain').show();
                    $('#img-review').show();
                    $('#img-review-img').show();
                    /*$('#reviews').show();*/
                    $('#accordion').show();
                    $('#img-drop').show();
                    $('#search_header').show();
            }
        });
        return false;
    }


});
