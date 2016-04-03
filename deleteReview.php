<?php
$pagetitle="Delete Review";
include "header.php";

$type = userType($_SESSION['user_id']);
if($type!='admin') {
    die();
}
else {
    if (isset ($_POST["delete-btn"])) {

        $search = $_POST["review_id"];

        echo deleteReview($search);
    }
}
?>
    <a href="adminPanel.php"> Delete Another Review </a>

<?php include "footer.php"?>