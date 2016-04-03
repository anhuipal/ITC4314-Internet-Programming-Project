<?php

function getUsers(){
    include "db.php";
    $results = $db->query("select * from users");
    $resultsArray = $results->fetchAll(PDO::FETCH_ASSOC);
    return $resultsArray;
}

function getUserById($id){
    include "db.php";
    $results = $db->prepare("select * from users WHERE user_id=?");
    $results->bindValue(1, $id);
    $results->execute();
    $resultsArray = $results->fetch(PDO::FETCH_ASSOC);
    return $resultsArray;
}

function getCourseById($id){
    include "db.php";
    $results = $db->prepare("select * from courses WHERE course_code=?");
    $results->bindValue(1, $id);
    $results->execute();
    $resultsArray = $results->fetch(PDO::FETCH_ASSOC);
    return $resultsArray;
}

function updateUser($password, $email, $lastname, $firstname,$user_id) {
    include "db.php";
    try {
        $results = $db->prepare("update users set fName=?, lName=?, email=?, password=? where user_id=?");
        $results->bindValue(1, $firstname);
        $results->bindValue(2, $lastname);
        $results->bindValue(3, $email);
        $results->bindValue(4, $password);
        $results->bindValue(5, $user_id);
        $results->execute();
        if ($results->rowCount() > 0 )
            return "<div class='jumbotron' align='center'><p class='alert-success'>User updated!</p></div>";
        else
            return "<div class='jumbotron' align='center'><p class='alert-danger'>User not updated!</p></div>";
    } catch (PDOException $e) {
        return "Error Updating User: " . $e;
    }
}

function uploadPDF($file){
    $target_dir = "pdfs/";
    $target_file = $target_dir . basename($_FILES[$file]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        "<div class='jumbotron' align='center'><p class='alert-danger'>Sorry the file is to large!</p></div>";
        $uploadOk = 0;
    }
// Allow certain file formats
    if($imageFileType != "pdf") {
        echo "<div class='jumbotron' align='center'><p class='alert-danger'>Sorry Only Pdf's are allowed</p></div>";
        $uploadOk = 0;
    }
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "<div class='jumbotron' align='center'><p class='alert-success'>File was uploaded!</p></div>";
        } else {
            echo "<div class='jumbotron' align='center'><p class='alert-danger'>File was not uploaded!</p></div>";
        }
    }
}

function updateCourse($course_desc,$course_code) {
    include "db.php";
    try {
        $results = $db->prepare("update courses set course_desc=? where course_code=?");
        $results->bindValue(1, $course_desc);
        $results->bindValue(2, $course_code);
        $results->execute();
        if ($results->rowCount() > 0 )
            return "<div class='jumbotron' align='center'><p class='alert-success'>Course updated!</p></div>";
        else
            return "<div class='jumbotron' align='center'><p class='alert-danger'>Course not updated!</p></div>";
    } catch (PDOException $e) {
        return "Error Updating User: " . $e;
    }
}

function getCourses(){
    include "db.php";
    $results = $db->query("select * from courses");
    $resultsArray = $results->fetchAll(PDO::FETCH_ASSOC);
    return $resultsArray;
}

function fillReviews(){
    include "db.php";
    $results = $db->query("select * from reviews");
    $resultsArray = $results->fetchAll(PDO::FETCH_ASSOC);
    return $resultsArray;
}

function deleteUser($user_id) {
    include "db.php";
    try {
        $results = $db->prepare("delete from users where user_id=?");
        $results->bindValue(1, $user_id);

        $results->execute();
        if ($results->rowCount() > 0 )
            return "User Deleted";
        else
            return "User not deleted " . $user_id;
    } catch (PDOException $e) {
        return "Error Deleting User: " . $e;
    }
}

function deleteReview($review_id) {
    include "db.php";
    try {
        $results = $db->prepare("delete from reviews where review_id=?");
        $results->bindValue(1, $review_id);

        $results->execute();
        if ($results->rowCount() > 0 )
            return "Review Deleted";
        else
            return "Review not deleted ";
    } catch (PDOException $e) {
        return "Error Deleting Review: " . $e;
    }
}

function deleteCourse($course_code) {
    include "db.php";
    try {
        $results = $db->prepare("delete from courses where course_code=?");
        $results->bindValue(1, $course_code);

        $results->execute();
        if ($results->rowCount() > 0 )
            return "Course Deleted";
        else
            return "Course not deleted ";
    } catch (PDOException $e) {
        return "Error Deleting Course: " . $e;
    }
}

function userType($user_id){
    try{
        include 'db.php';
        $results = $db->query("select user_type from users WHERE user_id=$user_id");
        $row = $results->fetchColumn();
        if($row==1){
            return 'admin';
        }
        else if($row==2){
            return 'professor';
        }
        else{
            return 'user';
        }
    }catch(PDOException $e){
        echo $e;
    }
}

function getFname($user_id){
    try {
        include "db.php";
        $results = $db->query("select fName from users WHERE user_id=$user_id");
        $row = $results->fetchColumn();
        return $row;
    }
    catch(PDOException $e){
        echo $e;
    }
}

function getMajorName($major_id){
    try {
        include "db.php";
        $results = $db->query("select major_desc from majors WHERE major_id=$major_id");
        $row = $results->fetchColumn();
        return $row;
    }
    catch(PDOException $e){
        echo $e;
    }
}

function fillMajors(){
    try {
        include "db.php";
        $results = $db->query("select major_id,major_desc from majors");
        $resultsArray = $results->fetchAll(PDO::FETCH_ASSOC);
        return $resultsArray;
    }catch(PDOException $e){
        echo $e;
    }
}

function getReviews($course_code){
    try {
        include "db.php";
        $result = '';
        $collaspeId = 0;
        $stm = $db->prepare("select * from reviews WHERE course_code=?");
        $stm->bindValue(1, $course_code);
        $stm->execute();
        $count = $stm->rowCount();
        if($count !=0) {
            $resultsArray = $stm->fetchAll(PDO::FETCH_ASSOC);
            foreach ($resultsArray as $row) {
                $result .= "<div class='panel panel-default'>
        <div class='panel-heading' role='tab' id=" . $row['review_id'] . ">
            <h4 class='panel-title'>
                <a role='button' data-toggle='collapse' data-parent='#accordion' href=" . '#' . ++$collaspeId . " aria-expanded=\"true\" aria-controls=" . $collaspeId . ">
                        Review $collaspeId
                </a>
            </h4>
        </div>
        <div id=" . $collaspeId . " class='panel-collapse collapse in' role='tabpanel' aria-labelledby=" . $row['review_id'] . ">
            <div class='panel-body'>
                " . $row['review_com'] . "
            </div>
        </div>
    </div>";
            }
            return $result;
        }
        else{
            return $result.="<div class='alert alert-danger'> <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Sorry no reviews are available for this course</div>";
        }
    }
    catch(PDOException $e){
        echo $e;
    }
}


function registerUser($id, $fName, $lName, $birth_year, $password,$email)
{
    include "db.php";
    try {
        $stmt = $db->prepare("SELECT * FROM users WHERE id=:id");
        $stmt->execute(array(":id" => $id));
        $count = $stmt->rowCount();

        if ($count == 0) {
            $results = $db->prepare("INSERT INTO users (user_id,fName, lName, birt_year, password,email) VALUES (?,?,?,?,?,?)");
            $results->bindValue(1, $id);
            $results->bindValue(2, $fName);
            $results->bindValue(3, $lName);
            $results->bindValue(4, $birth_year);
            $results->bindValue(5, $password);
            $results->bindValue(6, $email);

            $results->execute();

            if ($results->execute()) {
                echo "registered";
            } else {
                echo "Query could not execute !";
            }

        } else {

            echo "1"; //  not available
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}


function searchCourse($code){
    include "db.php";
    try{
       // $results = $db->prepare("select * from courses");
       // $results->bindValue(1,$code);
       // $results->execute();
        $results = $db->query("select * from courses");
        $resultsArray = $results->fetchAll(PDO::FETCH_ASSOC);
        return $resultsArray;
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}


function checkbrute($user_id, $mysqli) {
    include "db.php";
    $now = time();

    // All login attempts are counted from the past 2 hours.
    $valid_attempts = $now - (2 * 60 * 60);

    if ($stmt = $mysqli->prepare("SELECT time FROM login_attempts WHERE user_id = ? AND time > '$valid_attempts'")) {
        $stmt->bind_param(1, $user_id);

        // Execute the prepared query.
        $stmt->execute();
        $stmt->store_result();

        // If there have been more than 5 failed logins
        if ($stmt->num_rows > 5) {
            return true;
        } else {
            return false;
        }
    }
}

?>