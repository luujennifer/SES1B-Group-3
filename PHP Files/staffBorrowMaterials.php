<?php
	// STAFF BORROW MATERIALS SCRIPT 
	
	session_start();

	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$db = "bookshelf";
	
	$conn = new mysqli($dbhost, $dbuser, $dbpass, $db);

	$email = $_POST['email'];
	$book_id = $_POST['book_id'];
	$book_title = $_POST['book_title'];
	$book_author = $_POST['book_author'];
	$fee = '12';

	$sql = "INSERT INTO loans (email, book_id, book_title, book_author, due_date,  fee) 
			VALUES ('$email', '$book_id', '$book_title','$book_author', ADDDATE(now(), INTERVAL 14 DAY), '$fee')";
			
	if (!mysqli_query($conn, $sql)) {
		echo "<script>alert('Book loan failed, please try again.')</script>";
		echo "<script>location.replace('../HTML Files/staff-borrow-materials.html')</script>";
		
	}
	
	else {
		echo "<script>alert('Book loan sucessfully processed.')</script>";
		echo "<script>location.replace('../HTML Files/staff-account.html')</script>";
		
		
	}

?>