<?php
$pagetitle="Professor Panel";
include "header.php";

?>

<div class="jumbotron" align="center">
    <h1>Courses :</h1>
</div>
<table id="result-table3" class="table table-striped">
    <?php
    $courses = getCourses();
    $tableCourses.="<tr><th>Course Code</th><th>Course Descpriction</th><th>Course Title</th><th>Course Syllabus</th><th>Course Credits</th><th>Course Level</th><th>Major</th><th>Edit</th></tr>";
    foreach($courses as $row){
        $tableCourses.="<tr><td>". strtoupper($row["course_code"]) . "</td><td>" . $row["course_desc"] . "</td><td>" . $row["course_title"] . "</td> <td>" . "<a href='pdfs/".strtoupper($row["course_code"]) .".pdf' target='_blank'>Download</a>" . "</td><td>" . $row["course_credits"] . "</td><td>" . $row["course_level"] . "</td><td>" . getMajorName($row["major_id"]) . "</td>
    <td><form action='updateCourse.php' method='post' name='editCourse'>
    <input type='hidden' value=" . $row['course_code']  ." name='course_code'>
    <button type='submit' class='btn btn-danger' name='edit-btn' value=".$row['course_code'].">Edit</button>
    </form></td></tr>";
    }
    echo $tableCourses;
    ?>
    </table>


<?php

include "footer.php";

?>
