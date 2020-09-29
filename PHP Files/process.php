<?php

	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$db = "bookshelf";
	
	$conn = new mysqli($dbhost, $dbuser, $dbpass, $db);
		
	$email = $_POST['email'];
	$password = $_POST['password'];
	

	$sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password' ";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);
		

	if ($row['email'] == $email && $row['password'] == $password) {
		echo "Welcome ".$email." You have successfully logged in!";
		
	}
	
	
		else {
			
			echo "<script>alert('Check your Credentials')</script>";
			echo "<script>location.replace('../index.php')</script>";
			
		}
   

	
	
?>