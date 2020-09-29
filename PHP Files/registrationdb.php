<?php

	session_start();

	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$db = "bookshelf";
	
	$conn = new mysqli($dbhost, $dbuser, $dbpass, $db);

	$firstname = $_POST['FirstName'];
	$lastname = $_POST['LastName'];
	$email = $_POST['Email'];
	$password = $_POST['password'];

	$sql = "INSERT INTO users (firstname, lastname, email, password) 
			VALUES ('$firstname', '$lastname', '$email','$password')";
			
	if (!mysqli_query($conn, $sql)) {
		echo 'Registration failed';

	}
	
	else {
		echo 'Registration Successful';
		header('Location: ../index.php');
	}

?>