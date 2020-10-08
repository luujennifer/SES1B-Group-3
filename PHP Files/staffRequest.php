<?php

	session_start();

	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$db = "bookshelf";
	
	$conn = new mysqli($dbhost, $dbuser, $dbpass, $db);

	$author = $_POST['author'];
	$title = $_POST['title'];
	$ISBN = $_POST['ISBN'];
	$type = $_POST['category'];
	$format = $_POST['format'];

	$sql = "INSERT INTO book_request (author, title, ISBN, type, format) 
			VALUES ('$author', '$title', '$ISBN','$type', '$format')";
			
	if (!mysqli_query($conn, $sql)) {
		echo "<script>alert('Book request failed, please try again.')</script>";
		echo "<script>location.replace('../HTML Files/Staff Request.html')</script>";
	}
	
	else {
		echo "<script>alert('Book request sucessfully processed.')</script>";
		echo "<script>location.replace('../HTML Files/staff-account.html')</script>";
	}

?>