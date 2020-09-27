<?php
    $conn = mysqli_connect('localhost', 'root', '678iABj','bookshelf');
    if(!$conn){
        echo "Connection error: " .mysqli_error();
    }
    else{
        echo "Successfully connected!";
    }
?>
