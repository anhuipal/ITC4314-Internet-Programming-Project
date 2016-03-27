<?php

$pagetitle = "Sign Up";

include "header.php";
include_once "database/dbFunctions.php";

?>

<div class="jumbotron" align="center">
    <h1>Sign Up</h1>
</div>

<div class="img-responsive centered" align="center">
    <img src="img/booksearch2.jpg" width="50%" height="50%">
</div>

<div id="error" align="center"></div>

<form class="form-horizontal centered" style="color: #fff" method="POST" id="register-form">
    <div class="form-group" align="center">
        <label style="color: #0f0f0f" for="id" class="col-md-4 col-xs-12 col-sm-8 control-label">ID :</label>
        <div class="col-md-4 col-xs-12 col-sm-8">
            <input type="text" class="form-control" id="id" placeholder="Deree ID" name="id" required>
            <span id="check-id"></span>
        </div>
    </div>
    <div class="form-group align="center">
        <label style="color: #0f0f0f" for="password" class="col-md-4 col-xs-12 col-sm-8 control-label">Password : </label>
        <div class="col-md-4 col-xs-12 col-sm-8">
            <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
        </div>
    </div>
    <div class="form-group align="center">
        <label style="color: #0f0f0f" for="fName" class="col-md-4 col-xs-12 col-sm-8 control-label">First Name :</label>
        <div class="col-md-4 col-xs-12 col-sm-8">
            <input type="text" class="form-control" id="fName" placeholder="First Name" name="fName" required>
        </div>
    </div>
        <div class="form-group align="center">
        <label style="color: #0f0f0f" for="lName" class="col-md-4 col-xs-12 col-sm-8 control-label">Last Name :</label>
        <div class="col-md-4 col-xs-12 col-sm-8">
            <input type="text" class="form-control" id="lName" placeholder="Last Name" name="lName" required>
        </div>
    </div>
    <div class="form-group" align="center">
        <label style="color: #0f0f0f" for="email" class="col-md-4 col-xs-12 col-sm-8 control-label">Email :</label>
        <div class="col-md-4 col-xs-12 col-sm-8">
            <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
        </div>
    </div>
    <div class="form-group" align="center">
        <label style="color: #0f0f0f" for="major" class="col-md-4 col-xs-12 col-sm-8 control-label">Major :</label>
        <div class="col-md-4 col-xs-12 col-sm-8">
            <select class="form-control" id="major" name="major">
                <option hidden >Select Major...</option>
                <option value="0">No Major</option>
                <?php
                $major = fillMajors();

                foreach ($major as $row) {
                    echo '<option value="' . $row['major_id'] . '">' . $row['major_desc'] . '</option>';
                }
                ?>
            </select>
        </div>
    </div>
    <div class="form-group align="center">
        <label style="color: #0f0f0f" for="email" class="col-md-4 col-xs-12 col-sm-8 control-label">Birth Year :</label>
        <div class="col-md-4 col-xs-12 col-sm-8">
            <input type="date" class="form-control" id="bdate" placeholder="Birth Year" name="bdate" required>
        </div>
    </div>
    <div class="form-group" align="center">
        <div class="col-md-12 col-xs-12 col-sm-12">
            <button type="submit" class="btn btn-primary btn-block" value="register" id="btn-submit">Submit</button>
        </div>
    </div>
</form>



<?php

include "footer.php";

?>
