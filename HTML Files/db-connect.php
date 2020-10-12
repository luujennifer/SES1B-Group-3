<?php
    session_start();
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "bookshelf";
    $port = "81";

    $conn = new mysqli($dbhost, $dbuser, $dbpass, $db);
    if(!$conn){
        echo "Connection error: " .mysqli_error();
    }
    else{
        echo "Successfully connected!";
    }
?>
