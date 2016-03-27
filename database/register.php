<?php

$id = strip_tags($_POST["id"]);
$password = strip_tags($_POST["password"]);
$fName = strip_tags($_POST["fName"]);
$lName = strip_tags($_POST["lName"]);
$email = strip_tags($_POST["email"]);
$birth_year = strip_tags($_POST["bdate"]);
$major = $_POST["major"];

$id = stripcslashes($id);
$password = stripcslashes($password);
$fName = stripcslashes($fName);
$lName = stripcslashes($lName);
$email = stripcslashes($email);
$birth_year = stripcslashes($birth_year);

$password = md5($password);


include_once "db.php";

try {
    $stmt = $db->prepare("SELECT * FROM users WHERE user_id=?");
    $stmt->bindValue(1,$id);
    $stmt->execute();
    $count = $stmt->rowCount();

    if ($count == 0) {
        $results = $db->prepare("INSERT INTO users (user_id,fName, lName, birt_year, password,email,major_id) VALUES (?,?,?,?,?,?,?)");
        $results->bindValue(1, $id);
        $results->bindValue(2, $fName);
        $results->bindValue(3, $lName);
        $results->bindValue(4, $birth_year);
        $results->bindValue(5, $password);
        $results->bindValue(6, $email);
        $results->bindValue(7, $major);

        $results->execute();

        if ($results->execute()==0) {
            echo "registered";
        } else {
            echo "Query could not execute !";
        }

        //echo "registered";

    } else {
        echo "1"; //  not available
    }

} catch (PDOException $e) {
    echo $e->getMessage();
}