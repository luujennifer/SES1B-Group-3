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
	$fee = '12';

	// GET BOOK TITLE AND AUTHOR FROM BOOKS TABLE BASED ON ID ENTERED
	
	$sql = "INSERT INTO loans (email, book_id, book_title, book_author, due_date,  fee) 
			VALUES ('$email', '$book_id', (SELECT title FROM books WHERE book_id = $book_id),(SELECT author FROM books WHERE book_id = $book_id), ADDDATE(now(), INTERVAL 14 DAY), '$fee')";
			
	if (!mysqli_query($conn, $sql)) { // FAIL
		echo "<script>alert('Book loan failed, please try again.')</script>";
		echo "<script>location.replace('../HTML Files/staff-borrow-materials.html')</script>";
		
	}
	
	else { // PASS
		// REDUCE NUMBER OF BOOK COPIES FROM BOOKS
		$update_copies = "UPDATE books SET copies = copies - 1 WHERE book_id = $book_id";
		mysqli_query($conn, $update_copies);
		echo "<script>alert('Book loan sucessfully processed.')</script>";
		echo "<script>location.replace('../HTML Files/staff-account.html')</script>";
		
		
	}

?>