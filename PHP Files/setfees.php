<?php

	session_start();

	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$db = "bookshelf";
	
	$conn = new mysqli($dbhost, $dbuser, $dbpass, $db);

		//if (!empty($_POST['submit']) ) {

		$fee = $_POST['fee'];
		
		if ( $fee > 0 ) {
		$query = mysqli_query($conn, "UPDATE loans SET fee=$fee ");
		
			if (!mysqli_query($conn, $query)) { // PASS
				echo "<script>alert('Late fee successfully updated.')</script>";
				echo "<script>location.replace('../HTML Files/admin-account.html')</script>";
			}
			else { // FAIL
				echo "<script>alert('Late fee failed to update, please try again.')</script>";
				echo "<script>location.replace('../HTML Files/admin-set-fee.html')</script>";
			}

		}
		
		//}
?>