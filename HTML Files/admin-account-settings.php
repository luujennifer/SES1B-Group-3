<!-- ADMIN ACCOUNT SETTINGS -->

<!-- PHP SCRIPT FOR DYNAMIC CONTENT -->
<?php
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "689iABj";
	$db = "bookshelf";
	$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error); 
	$message = "Edit your account details below, remember to click Update Account to save changes.";

	$sqlValue = "SELECT * FROM `users` WHERE `account_type`='Admin' AND 'firstname'='$' AND 'lastname'='$'"; // need to match up name to admin account name
	$resultValue = mysqli_query($conn,$sqlValue);
	if (mysqli_num_rows($resultValue) >= 1) {
		while($row = $resultValue->fetch_assoc()) {
			$firstname = $row['firstname'];
			$lastname = $row['lastname'];
			$phonenumber = $row['phonenumber'];
			$email = $row['username'];
			$password = $row['password'];
		}
		
	}
	
		$firstname = $_POST['FirstName'];
		$lastname = $_POST['LastName'];
		$phonenumber = $_POST['PhoneNumber'];
		$email = $_POST['Email'];
		$password = $_POST['password'];
		$password2 = $_POST['password2'];
	
	
	//if($_SERVER["REQUEST_METHOD"] == "POST"){
	if(isset($_POST['submit'])) {
		if (empty($password)) { 
		$message = "Please ensure password is filled to update account details."; 
		}
	} else { 
		$sql = "SELECT * FROM `users` WHERE `usertype`='Admin' AND 'firstname'='$' AND 'lastname'='$'"; // need to match up name to admin account name
		$result = mysqli_query($conn,$sql);
		if (mysqli_num_rows($result) == 1) {
		//Pass
			$query = "INSERT INTO `users` (`firstname`, `lastname`, 'phonenumber', `email`, `password`) VALUES ('$firstname', '$lastname', '$phonenumber', '$email','$password')";
			if ($conn->query($query) === TRUE) {
				$message = "Your account details were sucessfully updated"; 
			} else {
				$message = "Oops :/ \n An error occured updating your account details, please try again.";
			}
		
		}
	} 
?>

<!DOCTYPE html>
<html> 
	<script src="https://kit.fontawesome.com/56b24aa4ed.js" crossorigin="anonymous"></script>
	<head>
		<title>Bookshelf</title> <!-- This is the title of the site that shows up in the tab feel free to change it -->
		<link rel="stylesheet" href="../CSS Files/WebsiteStyling.css"> <!-- Skeleton css file -->
		<link rel="stylesheet" href="../CSS Files/AccountSettingsStyling.css"> <!-- Skeleton css file -->
		<link href='https://fonts.googleapis.com/css?family=Armata' rel='stylesheet'> <!-- Google font file -->
		<link rel="icon" type="image/x-icon" href="../Misc Files/logo.ico"/> <!-- icon file -->
	</head>	
	<body>
		<!-- fixed top navigation bar -->
		<header>
			<div class="navigation" > 
				<a onclick="window.location.href='admin-account.html'"><img src="../Misc Files/logo(colour).png"/><b> Bookshelf</b></a>
				<div id="name">
					<p><b>Jane Smith</b><br>Admin</p>
					<a id="settings" onclick="window.location.href='admin-account-settings.html'"><i class="fas fa-cog"></i></a> 
				</div>
			</div>
		</header>
		
		<!-- <?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> --> 
		<!-- <script> 
			function data_entry_message () {
				alert("'.$message.'");
			}
		
		</script> -->
		
		<!-- content body of website -->
		<div class="body">
			<section class="contentContainer">
			
				<form class="settings" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST"> <!-- account  settings form -->
					<label for="settingsTitle" id="settingsTitle"><b>Account Settings</b></label>
					<!-- <p>Edit your account details below, remember to click <b>Update Account</b> to save changes.</p> -->
					<!-- <br> -->
					<p id="message" name="message"><?php echo $message ?></p>
					<br>
					
					<div id="left"> <!-- left aligned items -->
						<label id="firstnamelabel" for="firstName"><b>First Name</b></label>
						<input type="text" id="firstnamefield" name="FirstName" value="<?php echo $firstname ?>">
						<label id="emaillabel" for="email"><b>Email</b></label>
						<input type="email" id="emailfield" name="Email" value="<?php echo $email ?>">
						<label id="password1label" for="password"><b>Password</b></label>
						<input id="password1field" type="password" value="<?php echo $password ?>" minlength="5" name="password" required> <!-- password is required for all changes - need to check this works -->
					</div>
								
					<div id="right"> <!-- right aligned items -->
						<label id="lastnamelabel" for="lastName"><b>Last Name</b></label>
						<input type="text" id="lastnamefield" name="LastName" value="<?php echo $lastname ?>">
						<label id="phonenumberlabel" for="phoneNumber"><b>Phone Number</b></label>
						<input type="text" id="phonenumberfield" name="phoneNumber" minlength="10" value="<?php echo $phonenumber ?>">
						<label id="password2label" for="password"><b>Confirm Password</b></label>
						<input id="password2field" type="password" value="<?php echo $password2 ?>" minlength="5" name="password2">
					</div>
					
					<!-- button and link group -->
					<center>
						<div class="buttons">
							<button id="updateAcc" name="submit" type="submit"><b>UPDATE ACCOUNT</b></button>
							<button id="clearChanges" type="reset"><b>CLEAR</b></button>
						</div>
					</center>
				</form>
			
			</section>
		</div>
		
		<!-- fixed footer bar -->
		<div class="footer">
			<div class="etcDetails">
				<a href="https://github.com/luujennifer/SES1B-Group-3"><i class="fab fa-github"></i> GitHub</a>
				<a href="https://drive.google.com/drive/u/2/folders/0ALuTuEVm4VA2Uk9PVA"><i class="fab fa-google-drive"></i> Google Drive</a>
			</div>
			
			<p id="copyRight">Created by Group 3 for Software Engineering Studio 1B</p>
		</div>
	</body>
</html>