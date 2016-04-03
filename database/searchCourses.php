<?php

session_start();
include_once "db.php";
include_once "dbFunctions.php";

$search = strip_tags($_POST['search']);
$searchBy = $_POST['searchBy'];
$search = stripcslashes($search);
$search = strtolower($search);
$search = str_replace(' ','',$search);
$result ='';

try{
    if($searchBy==1) {
        $results = $db->prepare("select * from courses WHERE course_code=?");
        $results->bindValue(1, $search);
        $results->execute();
        $count = $results->rowCount();
        if ($count == 1) {
            $resultsArray = $results->fetchAll(PDO::FETCH_ASSOC);
            $result.="<table id='result-table' class='table table-striped' align='center'>";
            $result.= "<tr><th>Course Code</th><th>Course Descpriction</th><th>Course Title</th><th>Course Syllabus</th><th>Course Credits</th><th>Course Level</th><th>Major</th></tr>";
            foreach ($resultsArray as $row) {
                $result.="<tr><td>". strtoupper($row["course_code"]) . "</td><td>" . $row["course_desc"] . "</td><td>" . $row["course_title"] . "</td> <td>" . "<a href='pdfs/".strtoupper($row["course_code"]) .".pdf' target='_blank'>Download</a>" . "</td><td>" . $row["course_credits"] . "</td><td>" . $row["course_level"] . "</td><td>" . getMajorName($row["major_id"]) . "</td></tr>";
                $_SESSION['course_code'] = $row['course_code'];
            }
            $result.='</table>';
            echo $result;
        } else {
            echo "1";
        }
    }
    elseif($searchBy==2){
        $results = $db->prepare("select * from courses WHERE course_desc LIKE :searchTerm");
        $results->bindValue(':searchTerm', "%$search%");
        $results->execute();
        $count = $results->rowCount();
        if ($count == 1) {
            $resultsArray = $results->fetchAll(PDO::FETCH_ASSOC);
            $result.="<table id='result-table' class='table table-striped' align='center'>";
            $result.= "<tr><th>Course Code</th><th>Course Descpriction</th><th>Course Title</th><th>Course Syllabus</th><th>Course Credits</th><th>Course Level</th><th>Major</th></tr>";
            foreach ($resultsArray as $row) {
                $result.="<tr><td>". strtoupper($row["course_code"]) . "</td><td>" . $row["course_desc"] . "</td><td>" . $row["course_title"] . "</td> <td>" . "<a href='pdfs/".strtoupper($row["course_code"]) .".pdf' target='_blank'>Download</a>" . "</td><td>" . $row["course_credits"] . "</td><td>" . $row["course_level"] . "</td><td>" . getMajorName($row["major_id"]) . "</td></tr>";
                $_SESSION['course_code'] = $row['course_code'];
            }
            $result.='</table>';
            echo $result;
            //echo json_encode($resultsArray);
            //return $resultsArray;
        } else {
            echo "1";
        }
    }
    else{
        $results = $db->prepare("select * from courses WHERE course_title LIKE :searchTerm");
        $results->bindValue(":searchTerm", "%$search%");
        $results->execute();
        $count = $results->rowCount();
        if ($count == 1) {
            $resultsArray = $results->fetchAll(PDO::FETCH_ASSOC);
            $result.="<table id='result-table' class='table table-striped' align='center'>";
            $result.= "<tr><th>Course Code</th><th>Course Descpriction</th><th>Course Title</th><th>Course Syllabus</th><th>Course Credits</th><th>Course Level</th><th>Major</th></tr>";
            foreach ($resultsArray as $row) {
                $result.="<tr><td>". strtoupper($row["course_code"]) . "</td><td>" . $row["course_desc"] . "</td><td>" . $row["course_title"] . "</td> <td>" . "<a href='pdfs/".strtoupper($row["course_code"]) .".pdf' target='_blank'>Download</a>" . "</td><td>" . $row["course_credits"] . "</td><td>" . $row["course_level"] . "</td><td>" . getMajorName($row["major_id"]) . "</td></tr>";
                $_SESSION['course_code'] = $row['course_code'];
            }
            $result.='</table>';
            echo $result;
            //echo json_encode($resultsArray);
            //return $resultsArray;
        } else {
            echo "1";
        }
    }

}catch(PDOException $e){
    echo $e->getMessage();
}