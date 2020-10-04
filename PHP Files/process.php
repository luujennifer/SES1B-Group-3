<?php
	session_start();

	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = ""; // TO CHANGE TO DESIGNATED PASS
	$db = "bookshelf";
	
	$conn = new mysqli($dbhost, $dbuser, $dbpass, $db);
		
	$email = $_POST['email'];
	$password = $_POST['password'];
	

	$sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password' ";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);
		

	if ($row['email'] == $email && $row['password'] == $password) {
		$_SESSION["acc_email"] = $email;
		$_SESSION["acc_pass"] = $password;
		
		$account_type = $row['account_type'];
		if($account_type == "Student"){
			include ("User Account.html");
		} else if ($account_type == "Staff") {
			include ("staff-account.html");
		} else if ($account_type == "Admin") {
			include ("admin-account.html");
		}
		
	}
	
	
		else {
			
			echo "<script>alert('Check your Credentials')</script>";
			echo "<script>location.replace('../index.php')</script>"; 
			
		}
   

	
	
?>