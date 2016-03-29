<?php
session_start();
$review = strip_tags($_POST["reviewText"]);
$course_code = strip_tags($_POST['search']);
include_once "db.php";

try {
    $stmt = $db->prepare("SELECT * FROM reviews WHERE author_id=? AND course_code=?");
    $stmt->bindValue(1,$_SESSION['user_id']);
    $stmt->bindValue(2,$_SESSION['course_code']);
    $stmt->execute();
    $count = $stmt->rowCount();

   if ($count == 0) {
       $results = $db->prepare("INSERT INTO reviews (review_com,author_id,course_code) VALUES (?,?,?)");
       $results->bindValue(1, $review);
       $results->bindValue(2, $_SESSION['user_id']);
       $results->bindValue(3, $_SESSION['course_code']);
       $results->execute();
       echo "1";
   }
    else{
        echo "0";
    }

} catch (PDOException $e) {
    echo $e->getMessage();
}

