<?php


$id = $_POST["id"];
$password = $_POST["password"];
$fName = $_POST["fName"];
$lName = $_POST["lName"];
$email = $_POST["email"];
$birth_year = $_POST["bdate"];

echo $password . "</br>";
echo $id ."<br>";
echo $fName."<br>";
echo $lName."<br>";
echo $email."<br>";
echo $birth_year."<br>";


include "database/dbFunctions.php";

echo registerUser($id, $fName, $lName, $birth_year, $password,$email);

?>
