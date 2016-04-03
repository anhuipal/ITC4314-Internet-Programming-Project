<?php
$pagetitle="Edit User";
include "header.php";
session_start();
$type = userType($_SESSION['user_id']);
if($type!='admin') {
    die();
}
else {
    if (isset ($_POST["edit-btn"])) {

        $search = $_POST["user_id"];
        $_SESSION['updateID'] = $search;
        $user = getUserById($search);
    }
}
?>
    <div class="jumbotron" align="center">
        <h1>Edit User :</h1>
    </div>
    <form class="form-horizontal centered" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <div class="form-group align="center">
            <label style="color: #0f0f0f" for="password" class="col-md-4 col-xs-12 col-sm-8 control-label">Password : </label>
            <div class="col-md-4 col-xs-12 col-sm-8">
                <input type="password" class="form-control" id="password" placeholder="Password" name="password">
            </div>
            </div>
            <div class="form-group align="center">
            <label style="color: #0f0f0f" for="fName" class="col-md-4 col-xs-12 col-sm-8 control-label">First Name :</label>
            <div class="col-md-4 col-xs-12 col-sm-8">
                <input type="text" class="form-control" id="fName" placeholder="First Name" name="fName" value="<?php echo $user["fName"] ?>">
            </div>
            </div>
            <div class="form-group align="center">
            <label style="color: #0f0f0f" for="lName" class="col-md-4 col-xs-12 col-sm-8 control-label">Last Name :</label>
            <div class="col-md-4 col-xs-12 col-sm-8">
                <input type="text" class="form-control" id="lName" placeholder="Last Name" name="lName" value=" <?php echo $user["lName"] ?>">
            </div>
            </div>
            <div class="form-group" align="center">
                <label style="color: #0f0f0f" for="email" class="col-md-4 col-xs-12 col-sm-8 control-label">Email :</label>
                <div class="col-md-4 col-xs-12 col-sm-8">
                    <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="<?php echo $user["email"] ?>">
                </div>
            </div>
            <div class="form-group" align="center">
                <div class="col-md-12 col-xs-12 col-sm-12">
                    <input type="submit" class="btn btn-primary btn-lg" name="updateUser" value="Edit">
                </div>
            </div>
        </form>
    <p align="center"><a href="adminPanel.php"> Edit Another User </a></p>
<?php

if (isset ($_POST["updateUser"])) {
    echo updateUser(md5($_POST["password"]), $_POST["email"],$_POST["lName"], $_POST["fName"],$_SESSION['updateID']);
}
    ?>


<?php include "footer.php"?>