<?php
    include("db-connect.php");

    $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $accType = mysqli_real_escape_string($conn, $_POST['accType']);
    $psw = mysqli_real_escape_string($conn, $_POST['psw']);

    $sql = "INSERT INTO users(firstname, lastname, email, account_type, password) VALUES('$firstName', '$lastName', '$email', '$accType', '$psw')";

    if(mysqli_query($conn, $sql)){
        echo "Account created!";
        header('Location: ../index.php');
    }
    else{
        echo "Query error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
?>
