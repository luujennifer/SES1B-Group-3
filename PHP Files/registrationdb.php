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
	$type = $_POST['acc_type']

	$sql = "INSERT INTO users (firstname, lastname, email, password, account_type) 
			VALUES ('$firstname', '$lastname', '$email','$password', '$type')";
			
	if (!mysqli_query($conn, $sql)) {
		echo "<script>alert('Registration failed, please try again.')</script>";
		echo "<script>location.replace('../HTML Files/bookshelf-signup.html')</script>";
	}
	
	else {
		echo "<script>alert('Registration successful, you may login.')</script>";
		echo "<script>location.replace('../index.php')</script>";
	}

?>