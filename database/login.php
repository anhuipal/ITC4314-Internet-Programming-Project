<?php

session_start();

$id = strip_tags($_POST["login_id"]);
$password = strip_tags($_POST["login_pass"]);

$id = stripcslashes($id);
$password = stripcslashes($password);

$_SESSION['id'] = $id;

$password = md5($password);

include_once "db.php";

try {
    $stmt = $db->prepare("SELECT * FROM users WHERE user_id=? AND password=? ");
    $stmt->bindValue(1, $id);
    $stmt->bindValue(2, $password);
    $stmt->execute();
    $count = $stmt->rowCount();
    if($count==0){
        echo '1';
    }
    else{
        echo $id;
    }

}catch(PDOException $e){
    echo $e;
}