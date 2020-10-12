<?php
	// LOGIN SCRIPT
	
	session_start();

	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = ""; 
	$db = "bookshelf";
	
	$conn = new mysqli($dbhost, $dbuser, $dbpass, $db);
		
	$email = $_POST['email'];
	$password = $_POST['psw'];
	

	$sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password' ";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);
		

	if ($row['email'] == $email && $row['password'] == $password) {
		$_SESSION["acc_email"] = $email;
		$_SESSION["acc_pass"] = $password;
		
		$account_type = $row['account_type'];
		if($account_type == "Student"){
			echo "<script>location.replace('../HTML Files/User Account.html')</script>"; 
		} else if ($account_type == "Staff") {
			echo "<script>location.replace('../HTML Files/staff-account.html')</script>"; 
		} else if ($account_type == "Admin") {
			echo "<script>location.replace('../HTML Files/admin-account.html')</script>"; 
		}
		
	}
	
	
		else {
			
			echo "<script>alert('Check your Credentials')</script>";
			echo "<script>location.replace('../index.php')</script>"; 
			
		}
   

	
	
?>
