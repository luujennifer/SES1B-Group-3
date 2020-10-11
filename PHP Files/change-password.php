<?php

	session_start();

	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$db = "bookshelf";
	
	$conn = new mysqli($dbhost, $dbuser, $dbpass, $db);

		if (!empty($_POST['submit']) ) {

		$email = $_POST['email'];
		$password = $_POST['password'];
		$password2 = $_POST['password2'];
	
	
		if ($password==$password2) {
		$query = mysqli_query($conn,"UPDATE users SET password='$password' WHERE email='$email'");
		
		}
		
		if (!mysqli_query($conn, $query)) {
			echo 'Password updated';
			}

		}

?>