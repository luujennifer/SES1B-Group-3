<?php
	session_start();
	
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "689iABj"; // TO CHANGE TO DESIGNATED PASS
	$db = "bookshelf";
	
	$conn = new mysqli($dbhost, $dbuser, $dbpass, $db);
	
	$book_id = $_POST['book_id'];
	$book_title = $_POST['book_title'];
	$book_author =$_POST['book_author'];
	$fee = "12";
	$email = $_SESSION["acc_email"];
	

	$sql = "INSERT INTO 'loans' (email, book_id, book_title, book_author, borrow_date, due_date, fee) 
			VALUES ('$email', '$book_id', '$book_title','$book_author', now(), DATE_ADD(now(), INTERVAL 2 WEEK), '$fee')";
		
		
			
	if (!mysqli_query($conn, $sql)) {
		echo "<script>alert('Oops, an error has occured. Please try again.')</script>";
		
	}
	
	else {
		echo "<script>alert('Loan has been processed.')</script>";
	}

?>