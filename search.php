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
            <p><a href="seeallcourses.php">See all courses</a></p>
        </div>
    </form>
</div>

<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true" hidden>
    <div class="jumbotron" align="center"><h2 align="center">Reviews:</h2></div>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingOne">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Collapsible Group Item #1
                </a>
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
            <div class="panel-body">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingTwo">
            <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Collapsible Group Item #2
                </a>
            </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
            <div class="panel-body">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingThree">
            <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Collapsible Group Item #3
                </a>
            </h4>
        </div>
        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
            <div class="panel-body">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
            </div>
        </div>
    </div>
</div>

<div class="jumbotron" id="searchAgain" hidden>
    <p align="center"><a href="search.php">Search Again?</a></p>
</div>


<?php

include "footer.php";

?>
