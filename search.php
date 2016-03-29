<?php

$pagetitle = "Search Courses";

include "header.php";


?>

<div class="alert-danger" id="error" hidden></div>
<div class="jumbotron" id="search_header" align="center" hidden>
    <h1>Course Information:</h1>
</div>

<div class="jumbotron" id="results" hidden></div>
<div class="container" id="reviews" hidden></div>

<div class="jumbotron" align="center" id="searchBody">
        <h1>Search Courses</h1>
        <p>The simplest way of knowing</p>

    <div class="img-responsive centered" align="center">
        <img src="img/booksearch2.jpg" width="50%" height="50%">
    </div>



    <form class="form-horizontal centered" style="color: #fff" id="src-courses" method="post">
        <div class="form-group" align="center">
            <label style="color: #0f0f0f" for="search" class="col-md-4 col-xs-12 col-sm-8 control-label"></label>
            <div class="col-md-4 col-xs-12 col-sm-8">
                <input type="text" class="form-control input-lg" id="search" placeholder="Search Course" name="search" required>
            </div>
        </div>
        <div class="form-group" align="center">
            <label style="color: #0f0f0f" for="searchBy" class="col-md-4 col-xs-12 col-sm-8 control-label"></label>
            <div class="col-md-4 col-xs-12 col-sm-8">
                <select class="form-control" id="searchBy" name="searchBy" required>
                    <option hidden >Select search criteria...</option>
                    <option value="1">Course Code</option>
                    <option value="2">Course Description</option>
                    <option value="3">Course Title</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block" name="submit" value="submit" id="btn-submit">Search</button>
        <div class="jumbotron">
            <p><a href="seeAllCourses.php">See all courses</a></p>
        </div>
    </form>
</div>

<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true" hidden>
    <div class="jumbotron" align="center"><h2 align="center">Reviews:</h2></div>
    <?php echo getReviews($_SESSION['course_code']);?>
</div>

<div class="jumbotron" id="searchAgain" hidden>
    <p align="center"><a href="search.php">Search Again?</a></p>
</div>


<?php

include "footer.php";

?>
