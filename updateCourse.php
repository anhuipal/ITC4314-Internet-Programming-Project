<?php
$pagetitle="Edit Course";
include "header.php";
session_start();
$type = userType($_SESSION['user_id']);
if($type!='admin') {
    die();
}
else {
    if (isset ($_POST["edit-btn"])) {

        $search = $_POST["course_code"];
        $_SESSION['updateCourseID'] = $search;
        $user = getCourseById($search);
    }
}
?>
    <div class="jumbotron" align="center">
        <h1>Edit Course :</h1>
    </div>
    <form class="form-horizontal centered" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <div class="form-group align="center">
        <label style="color: #0f0f0f" for="course_desc" class="col-md-4 col-xs-12 col-sm-8 control-label">Course description : </label>
        <div class="col-md-4 col-xs-12 col-sm-8">
            <input type="text" class="form-control" id="course_desc" placeholder="Course description" name="course_desc">
        </div>
        </div>
        <div class="form-group align="center">
        <label style="color: #0f0f0f" for="course_syllabus" class="col-md-4 col-xs-12 col-sm-8 control-label">Syllabus :</label>
        <div class="col-md-4 col-xs-12 col-sm-8">
            <input type="file" class="form-control" name="fileToUpload" id="fileToUpload">
        </div>
        </div>
        <div class="form-group" align="center">
            <div class="col-md-12 col-xs-12 col-sm-12">
                <input type="submit" class="btn btn-primary btn-lg" name="updateCourse" value="Edit">
            </div>
        </div>
    </form>
    <p align="center"><a href="adminPanel.php"> Edit Another Course </a></p>
<?php

if (isset ($_POST["updateCourse"])) {
    echo updateCourse($_POST['course_desc'],$_SESSION['updateCourseID']);
    echo uploadPDF($_POST['fileToUpload']);
}
?>


<?php include "footer.php"?>