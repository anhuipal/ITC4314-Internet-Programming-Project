<?php
include "config.php";
try{
    $db = new PDO("mysql:host=" . DB_HOST .
        ";dbname=" . DB_NAME .
        ";port=" . DB_PORT,DB_USER,DB_PASS);

    //echo "connected" . '<br/>';
}
catch (Exception $e){
    echo "did not connect";
    exit;

}

?>
