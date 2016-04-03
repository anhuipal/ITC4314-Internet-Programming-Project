<?php
$pagetitle="Admin Panel";
include "header.php";

$type = userType($_SESSION['user_id']);
if($type!='admin') {
    die();
    header('index.php');
}
?>
<div class="jumbotron" align="center"><h1>Users :</h1></div>
<table id="result-table" class="table table-striped">
<?php

$users = getUsers();
$tableUsers.= "<tr><th>User id</th><th>First Name</th><th>Last Name</th><th>Birth Year</th><th>Password</th><th>Email</th><th>Major id</th><th>User type</th><th>Date Created</th><th>Edit</th><th>Delete</th></tr>";
foreach($users as $row){
    $tableUsers.="<tr><td>". $row["user_id"] . "</td><td>" . $row["fName"] . "</td><td>" . $row["lName"] . "</td><td>" . $row["birt_year"] . "</td><td>" . $row["password"] . "</td><td>" . $row["email"] . "</td><td>" . getMajorName($row["major_id"]) . "</td><td>" . userType($row["user_id"]) . "</td><td>" . $row["dateCreated"] . "</td>
    <td><form action='editUser.php' method='post' name='editUser'>
    <input type='hidden' value=" . $row['user_id']  ." name='user_id'>
    <input type='submit' class='btn btn-danger' name='edit-btn' value='Edit'>
    </form></td>
    <td><form action='deleteUser.php' method='post' name='deleteUser'>
    <input type='hidden' value=" . $row['user_id']  ." name='user_id'>
    <input type='submit' class='btn btn-danger' name='delete-btn' value='Delete'>
    </form></td>
    </tr>";

}
echo $tableUsers;
?>
</table>
<div class="jumbotron" align="center">
    <h1>Reviews :</h1>
</div>

<table id="result-table2" class="table table-striped">
<?php
$reviews = fillReviews();
$tableReviews.= "<tr><th>Review id</th><th>Author id</th><th>Review comment</th><th>Course Code</th><th>Delete</th></tr>";
foreach($reviews as $row){
    $tableReviews.="<tr><td>". $row["review_id"] . "</td><td>" . $row["author_id"] . "</td><td>" . $row["review_com"] . "</td><td>" . $row["course_code"] . "</td>
    <td><form action='deleteReview.php' method='post' name='deleteReview'>
    <input type='hidden' value=" . $row['review_id']  ." name='review_id'>
    <input type='submit' class='btn btn-danger' name='delete-btn' value='Delete'>
    </form></td>
    </tr>";
}
echo $tableReviews;
?>
</table>
<div class="jumbotron" align="center">
    <h1>Courses :</h1>
</div>
<table id="result-table3" class="table table-striped">
<?php
$courses = getCourses();
$tableCourses.="<tr><th>Course Code</th><th>Course Descpriction</th><th>Course Title</th><th>Course Syllabus</th><th>Course Credits</th><th>Course Level</th><th>Major</th><th>Edit</th><th>Delete</th></tr>";
foreach($courses as $row){
    $tableCourses.="<tr><td>". strtoupper($row["course_code"]) . "</td><td>" . $row["course_desc"] . "</td><td>" . $row["course_title"] . "</td> <td>" . "<a href='pdfs/".strtoupper($row["course_code"]) .".pdf' target='_blank'>Download</a>" . "</td><td>" . $row["course_credits"] . "</td><td>" . $row["course_level"] . "</td><td>" . getMajorName($row["major_id"]) . "</td>
    <td><form action='updateCourse.php' method='post' name='editCourse'>
    <input type='hidden' value=" . $row['course_code']  ." name='course_code'>
    <button type='submit' class='btn btn-danger' name='edit-btn' value=".$row['course_code'].">Edit</button>
    </form></td>
    <td>
    <form action='deleteCourse.php' method='post' name='deleteCourse'>
    <input type='hidden' value=" . $row['course_code']  ." name='course_code'>
    <input type='submit' class='btn btn-danger' name='delete-btn' value='Delete'>
    </form></td></tr>";
}
echo $tableCourses;
?>
</table>
<?php

include "footer.php";

?>
