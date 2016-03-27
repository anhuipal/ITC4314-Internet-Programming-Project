<?php
include_once 'db.php';
include_once 'dbFunctions.php';

sec_session_start(); // Our custom secure way of starting a PHP session.

if (isset($_POST['id'], $_POST['p'])) {
    $id = $_POST['id'];
    $password = $_POST['p']; // The hashed password.

    if (login($id, $password, $mysqli) == true) {
        // Login success
        header('Location: ../protected_page.php');
    } else {
        // Login failed
        header('Location: ../index.php?error=1');
    }
} else {
    // The correct POST variables were not sent to this page.
    echo 'Invalid Request';
}