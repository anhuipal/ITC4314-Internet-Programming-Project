<?php session_start();
include_once 'database/dbFunctions.php';
$_SESSION['user_id']=$_SESSION['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="img/icon-logo" rel="shortcut icon" />
    <title><?php echo $pagetitle;?></title>

    <link href="css/normalize.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="js/jquery-2.2.1.js"></script>
    <script src="http://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/loginmodal.js"></script>
    <script type="text/javascript" src="js/register.js"></script>
    <script type="text/javascript" src="js/search.js"></script>
    <script type="text/javascript" src="js/review.js"></script>
    <script type="text/javascript" src="js/login.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#destroy').click(function(){
                $.ajax({
                    url: './database/logout.php',
                    /*data: data,*/
                    success: function(data){
                        window.location.href = 'index.php';
                    }
                });
            });
        });
    </script>

    <?php
    if(isset($_SESSION['user_id'])) {
        echo "<script type='text/javascript'>$(document).ready(function(){

            $('#logOut').show();
            $('#signIn').hide();
            $('#welcome-msg').show();
            $('#signUp').hide();

});</script>";
    }
    ?>

    <?php
    if(!isset($_SESSION['user_id']) && basename($_SERVER['PHP_SELF'])=='rate.php') {
        echo "<script type='text/javascript'>$(document).ready(function(){

            $('#error').show();
            $(\"#error\").html('<div class=\"alert alert-danger\"> <span class=\"glyphicon glyphicon-info-sign\"></span> &nbsp; Please login in order to review courses !</div>');
            $('#review-submit').prop('disabled',true);
});</script>";
    }
    ?>

    <?php
    if(isset($_SESSION['user_id'])) {
        $type = userType($_SESSION['user_id']);
        if ($type == 'admin') {
            echo "<script type='text/javascript'>$(document).ready(function(){

            $('#adminPanel').show();

});</script>";
        }
    }
    ?>


</head>

<body>
<nav class="navbar navbar-default" >
    <div class="container-fluid">

        <div class="navbar-header" >
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Academic Planner<span><img src="img/logo.png" width="10%"></span></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-left">
                <li><a href="search.php">Search<span class="sr-only">(current)</span></a></li>
                <li><a href="rate.php">Rate/Review</a></li>
                <li><a href="planner.php">Plan</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li id="login-msg"><p id="welcome-msg" class="text-left" align="center" style="color: #fff;padding: 12px; font-size: 1.2em" hidden>Welcome <?php if(isset($_SESSION['user_id'])){echo getFname($_SESSION['user_id']);}?>!</p></li>
                <li id="signin"><p class="text-left" id="signIn"><a href="#" class="btn btn-primary btn-lg navbtn" role="button" data-toggle="modal" data-target="#login-modal">Sign In</a></p></li>
                <li><p class="text-left" id="adminPanel" hidden><a href="adminPanel.php" class="btn btn-primary btn-lg navbtn" role="button">Admin Panel</a></p></li>
                <li id="logout" ><p class="text-left" id="logOut" hidden><button name="btn-logout" class="btn btn-primary btn-lg navbtn" onclick="location.reload(true);" id="destroy">Sign out</button></p></li>
                <li id="signup"><p class="text-left" id="signUp"><a href="signup.php" class="btn btn-primary btn-lg" role="button">Sign Up</a></p></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->

    <!-- BEGIN # MODAL LOGIN -->
    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" align="center">
                    <img class="img-circle" id="img_logo" src="img/loginArrow.png">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </button>
                </div>

                <!-- Begin # DIV Form -->
                <div id="div-forms">
                    <!-- Begin # Login Form -->
                    <form id="login-form">
                        <div class="modal-body">
                            <div id="div-login-msg">
                                <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
                                <span id="text-login-msg">Type your username and password.</span>
                            </div>
                            <input id="login_id" name="login_id" class="form-control" type="text" placeholder="ID" required>
                            <input id="login_pass" name="login_pass" class="form-control" type="password" placeholder="Password" required>
                            <div class="checkbox">
                                <p align="center">
                                    <input type="checkbox"> Remember me</p>
                            </div>
                        </div>
                        <div class="modal-footer" align="center">
                            <div align="center">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
                            </div>

                              <p align="center"><button id="login_register_btn" type="button" class="btn btn-link btn-block">Register</button></p>

                       </div>
                   </form>

</nav>