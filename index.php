<?php
$pagetitle="Academic Planner";
include "header.php";
include_once "database/db.php";
?>


<?php
include_once 'database/db.php';
include_once 'database/dbFunctions.php';
?>
<div class="img-responsive">
    <img src="img/SCGBanner.jpg" alt="Banner" style="max-width: 100%" align="center">
</div>


<div class="row" id="info" align="center">
    <div class="col-xs-12 col-md-4"><h1>Search Courses</h1><p> Learn more about your courses, the simplest way of knowing about your courses, see what other have to say about a courses through a robust review system. See course sylabous,level,rational and description! </p><br>
        <p>
            <a href="search.php" class="btn btn-default btn-lg" role="button">Learn More</a>
        </p></div>
    <div class="col-xs-12 col-md-4"><h1>Review/Rate Courses</h1> <p>Review courses, pass your knowledge to others help your fellow students and instructors to improve the course for your benefit, help the your institution give feedback. Strife for excellence!</p>
        <p>
            <a href="rate.php" class="btn btn-default btn-lg" role="button">Learn More</a>
        </p>
    </div>
    <div class="col-xs-12 col-md-4"><h1>Plan your Academic Career</h1><p>Plan your academic career through a robust system, this application will help you select and plan your academic career through out your years in Deree. No more confusion and last minute problems with selecting courses for your semester!</p>
        <p>
            <a href="planner.php" class="btn btn-default btn-lg" role="button">Learn More</a>
        </p>
    </div>
</div>

<?php

include "footer.php";
?>