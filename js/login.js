$('document').ready(function()
{
    /* validation */
    $("#login-form").validate({
        rules:
        {
            login_id: {
                required: true,
                minlength: 6,
                maxlength:6
            },
            login_pass: {
                required: true,
                minlength: 8,
                maxlength: 15
            },
        },
        messages:
        {
            login_id :{
                minlength: "please provide 6 digits",
                maxlength: "please provide 6 digits"
            },
            login_pass:{
                minlength: "password at least have 8 characters"
            },
        },
        submitHandler: login
    });

    var $formLogin = $('#login-form');
    var $divForms = $('#div-forms');
    var $modalAnimateTime = 300;
    var $msgAnimateTime = 150;
    var $msgShowTime = 2000;

    function login()
    {
        var data = $("#login-form").serialize();
        console.log(data);
        $.ajax({

            type : 'POST',
            url  : './database/login.php',
            data : data,
            success :  function(data)
            {
                if(data==1){

                    msgChange($('#div-login-msg'), $('#icon-login-msg'), $('#text-login-msg'), "error", "glyphicon-remove", "Login error");

                } else{
                    msgChange($('#div-login-msg'), $('#icon-login-msg'), $('#text-login-msg'), "success", "glyphicon-ok", "Login OK");
                    setTimeout(function () {
                        location.reload(true);
                    }, 2000);

                }
            }
        });
        return false;
    }

    function modalAnimate ($oldForm, $newForm) {
        var $oldH = $oldForm.height();
        var $newH = $newForm.height();
        $divForms.css("height",$oldH);
        $oldForm.fadeToggle($modalAnimateTime, function(){
            $divForms.animate({height: $newH}, $modalAnimateTime, function(){
                $newForm.fadeToggle($modalAnimateTime);
            });
        });
    }

    function msgFade ($msgId, $msgText) {
        $msgId.fadeOut($msgAnimateTime, function() {
            $(this).text($msgText).fadeIn($msgAnimateTime);
        });
    }

    function msgChange($divTag, $iconTag, $textTag, $divClass, $iconClass, $msgText) {
        var $msgOld = $divTag.text();
        msgFade($textTag, $msgText);
        $divTag.addClass($divClass);
        $iconTag.removeClass("glyphicon-chevron-right");
        $iconTag.addClass($iconClass + " " + $divClass);
        setTimeout(function() {
            msgFade($textTag, $msgOld);
            $divTag.removeClass($divClass);
            $iconTag.addClass("glyphicon-chevron-right");
            $iconTag.removeClass($iconClass + " " + $divClass);
        }, $msgShowTime);
    }

});