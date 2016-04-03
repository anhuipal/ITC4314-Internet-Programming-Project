<?php
$pagetitle="Delete Course";
include "header.php";

$type = userType($_SESSION['user_id']);
if($type!='admin') {
    die();
}
else {
    if (isset ($_POST["delete-btn"])) {

        $search = $_POST["course_code"];

        echo deleteCourse($search);
    }
}
?>
    <a href="adminPanel.php"> Delete Another Course </a>

<?php include "footer.php"?>