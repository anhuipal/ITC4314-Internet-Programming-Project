<?php
$pagetitle="Delete User";
include "header.php";

$type = userType($_SESSION['user_id']);
if($type!='admin') {
    die();
}
else {
    if (isset ($_POST["delete-btn"])) {

        $search = $_POST["user_id"];

        echo deleteUser($search);
    }
}
 ?>
    <a href="adminPanel.php"> Delete Another User </a>

<?php include "footer.php"?>