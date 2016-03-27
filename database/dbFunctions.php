<?php

function getUsers(){
    include "db.php";
    $results = $db->query("select * from users");
    $resultsArray = $results->fetchAll(PDO::FETCH_ASSOC);
    return $resultsArray;
}

function isAdmin($user_id){
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

function fillMajors(){
    include "db.php";
    $results = $db->query("select major_id,major_desc from majors");
    $resultsArray = $results->fetchAll(PDO::FETCH_ASSOC);
    return $resultsArray;
}

function login($id,$password){
    session_start();
    include "db.php";
    $id = strip_tags($id);
    $password = strip_tags($password);
    $id = stripcslashes($id);
    $password = striplashes($password);

    try{

        $stmt = $db->prepare("SELECT * FROM users WHERE user_id=? LIMIT 1");
        $stmt->bindValue(1,$id);
        $stmt->execute();
        $count = $stmt->rowCount();
        $row = mysql_fetch_array($stmt);
        $db_password = $row['password'];
        if($count==1){
            if($db_password==$password){
                echo "login";
                $_SESSION['id'] = $id;
                header("Location: index.php");
            }else{
                echo "incorrectpass";
            }
        }
        else{
            echo "userdoesnotexist";
        }

    }catch(PDOException $e){
        echo $e->getMessage();
    }
}//end of login




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

function sec_session_start() {
    $session_name = 'sec_session_id';   // Set a custom session name
    $secure = true;
    // This stops JavaScript being able to access the session id.
    $httponly = true;
    // Forces sessions to only use cookies.
    if (ini_set('session.use_only_cookies', 1) === FALSE) {
        header("Location: ../error.php?err=Could not initiate a safe session (ini_set)");
        exit();
    }
    // Gets current cookies params.
    $cookieParams = session_get_cookie_params();
    session_set_cookie_params($cookieParams["lifetime"],
        $cookieParams["path"],
        $cookieParams["domain"],
        $secure,
        $httponly);
    // Sets the session name to the one set above.
    session_name($session_name);
    session_start();            // Start the PHP session
    session_regenerate_id(true);    // regenerated the session, delete the old one.
}

function login1($user_id,$email, $password) {
    include "db.php";
    // Using prepared statements means that SQL injection is not possible.
    if ($stmt = $db->prepare("SELECT user_id, password FROM users WHERE email = ? LIMIT 1")) {
        $stmt->bind_param(1, $email);  // Bind "$email" to parameter.
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();

        // get variables from result.
        $stmt->bind_result($user_id, $password);
        $stmt->fetch();

        if ($stmt->num_rows == 1) {
            // If the user exists we check if the account is locked
            // from too many login attempts

            if (checkbrute($user_id, $db) == true) {
                // Account is locked
                // Send an email to user saying their account is locked
                return false;
            } else {
                // Check if the password in the database matches
                // the password the user submitted. We are using
                // the password_verify function to avoid timing attacks.
                if (password_verify($password)) {
                    // Password is correct!
                    // Get the user-agent string of the user.
                    $user_browser = $_SERVER['HTTP_USER_AGENT'];
                    // XSS protection as we might print this value
                    $user_id = preg_replace("/[^0-9]+/", "", $user_id);
                    $_SESSION['user_id'] = $user_id;
                    $_SESSION['login_string'] = hash('sha512', $password . $user_browser);
                    // Login successful.
                    return true;
                } else {
                    // Password is not correct
                    // We record this attempt in the database
                    $now = time();
                    $db->query("INSERT INTO login_attempts(user_id, time)VALUES ('$user_id', '$now')");
                    return false;
                }
            }
        } else {
            // No user exists.
            return false;
        }
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

function login_check($mysqli) {

    include "db.php";

    // Check if all session variables are set
    if (isset($_SESSION['user_id'], $_SESSION['login_string'])) {

        $user_id = $_SESSION['user_id'];
        $login_string = $_SESSION['login_string'];

        // Get the user-agent string of the user.
        $user_browser = $_SERVER['HTTP_USER_AGENT'];

        if ($stmt = $mysqli->prepare("SELECT password FROM users WHERE id = ? LIMIT 1")) {
            // Bind "$user_id" to parameter.
            $stmt->bind_param(1, $user_id);
            $stmt->execute();   // Execute the prepared query.
            $stmt->store_result();

            if ($stmt->num_rows == 1) {
                // If the user exists get variables from result.
                $stmt->bind_result($password);
                $stmt->fetch();
                $login_check = hash('sha512', $password . $user_browser);

                if (hash_equals($login_check, $login_string) ){
                    // Logged In!!!!
                    return true;
                } else {
                    // Not logged in
                    return false;
                }
            } else {
                // Not logged in
                return false;
            }
        } else {
            // Not logged in
            return false;
        }
    } else {
        // Not logged in
        return false;
    }
}

function esc_url($url) {

    if ('' == $url) {
        return $url;
    }

    $url = preg_replace('|[^a-z0-9-~+_.?#=!&;,/:%@$\|*\'()\\x80-\\xff]|i', '', $url);

    $strip = array('%0d', '%0a', '%0D', '%0A');
    $url = (string) $url;

    $count = 1;
    while ($count) {
        $url = str_replace($strip, '', $url, $count);
    }

    $url = str_replace(';//', '://', $url);

    $url = htmlentities($url);

    $url = str_replace('&amp;', '&#038;', $url);
    $url = str_replace("'", '&#039;', $url);

    if ($url[0] !== '/') {
        // We're only interested in relative links from $_SERVER['PHP_SELF']
        return '';
    } else {
        return $url;
    }
}



?>