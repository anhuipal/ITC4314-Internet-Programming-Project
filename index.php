<?php
$pagetitle="Academic Planner";
include "header.php";
include_once "database/db.php";
$_SESSION['user_id'] = $_SESSION['id'];
?>


<?php
include_once 'database/db.php';
include_once 'database/dbFunctions.php';
?>
<div class="img-responsive">
    <img src="img/SCGBanner.jpg" alt="Banner" style="max-width: 100%" align="center">
</div>


<div class="row" id="info" align="center">
    <div class="col-xs-12 col-md-4"><h1>Search Courses</h1><p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras at tristique nisi. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras eros dui, fringilla in sem eget, feugiat luctus ex. Nam auctor tellus nec risus rhoncus, in sollicitudin lectus pulvinar. Pellentesque ligula sapien, viverra et lectus at, rutrum bibendum nulla. Curabitur auctor lectus a orci vulputate tempor at nec libero. Donec sodales lectus sed tellus sodales, sit amet vehicula nunc rutrum. Vivamus imperdiet malesuada enim sed posuere. Fusce fermentum ipsum vitae dolor scelerisque fringilla. Vivamus convallis magna eu leo sodales consectetur.</p><br>
        <p>
            <a href="search.php" class="btn btn-default btn-lg" role="button">Learn More</a>
        </p></div>
    <div class="col-xs-12 col-md-4"><h1>Review/Rate Courses</h1> <p>Morbi facilisis eget ligula nec semper. Integer in nunc suscipit, blandit nunc nec, fermentum velit. Ut tristique libero quis luctus blandit. Duis luctus nec enim vel placerat. Sed cursus est non facilisis volutpat. Maecenas dui felis, ullamcorper at odio a, posuere eleifend nisl. Nulla ac eros a ex convallis ultricies. Curabitur sollicitudin odio in massa rutrum tincidunt. Donec sit amet tempus felis. Curabitur et pellentesque diam. Aenean placerat nunc purus, nec faucibus est mattis in. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Fusce sollicitudin faucibus tellus, pellentesque ultricies ex tempus id. Donec sodales ultricies diam, non mollis nulla maximus quis. Phasellus ac viverra nibh, id convallis orci. Nulla a nulla nibh.</p>
        <p>
            <a href="rate.php" class="btn btn-default btn-lg" role="button">Learn More</a>
        </p>
    </div>
    <div class="col-xs-12 col-md-4"><h1>Plan your Academic Career</h1><p>Donec pellentesque massa dapibus, congue leo varius, mattis tortor. Aenean fermentum pellentesque purus, sit amet tincidunt enim. Ut vitae orci egestas, molestie velit sit amet, cursus orci. Vestibulum ut purus porta, porttitor nulla quis, varius tellus. Ut tempor arcu vel nulla convallis semper. Donec sed augue pharetra, varius metus vel, luctus leo. Aenean iaculis malesuada est non laoreet. Aliquam mattis elit eget purus lacinia dapibus. Cras id sem auctor, pulvinar neque sit amet, fringilla nunc. Sed ut pharetra augue, nec tempor libero. Phasellus ligula urna, tincidunt at dui sed, dictum elementum nisl. Aliquam nec leo tempus, venenatis velit sed, auctor urna.</p>
        <p>
            <a href="planner.php" class="btn btn-default btn-lg" role="button">Learn More</a>
        </p>
    </div>
</div>

<?php

include "footer.php";
?>