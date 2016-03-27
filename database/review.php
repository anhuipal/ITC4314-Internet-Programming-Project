<?php
session_start();
$review = strip_tags($_POST["reviewText"]);
include_once "db.php";

try {
    $stmt = $db->prepare("SELECT * FROM reviews WHERE author_id=?");
    $stmt->bindValue(1,$_SESSION['user_id']);
    $stmt->execute();
    $count = $stmt->rowCount();

   if ($count == 0) {
       $results = $db->prepare("INSERT INTO reviews (review_com,author_id,course_code) VALUES (?,?,'itc4314')");
       $results->bindValue(1, $review);
       $results->bindValue(2, $_SESSION['user_id']);
       $results->execute();
       echo "1";
   }
    else{
        echo "0";
    }

} catch (PDOException $e) {
    echo $e->getMessage();
}

