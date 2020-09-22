<!-- BASIC WEBSITE SKELETON -->

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
				<a onclick="window.location.href='staff-account.html'"><img src="../Misc Files/logo(colour).png"/><b> Bookshelf</b></a>
				<div id="name">
					<p><b>Jane Smith</b><br>Admin</p>
					<a id="settings" onclick="window.location.href='staff-account-settings.html'"><i class="fas fa-cog"></i></a> <!-- need to link to settings page -->
				</div>
			</div>
		</header>
		
		<!-- content body of website -->
		<div class="body">
			<section class="contentContainer">
			
				<form class="settings" action="" method="POST"> <!-- account  settings form -->
					<label for="settingsTitle" id="settingsTitle"><b>Account Settings</b></label>
					<p>Edit your account details below, remember to click <b>Update Account</b> to save changes.</p>
					<br>
					<!-- <br> -->
					
					<div id="left"> <!-- left aligned items -->
						<label id="firstnamelabel" for="firstName"><b>First Name</b></label>
						<input type="text" id="firstnamefield" name="FirstName" placeholder="">
						<label id="emaillabel" for="email"><b>Email</b></label>
						<input type="email" id="emailfield" name="Email" placeholder="">
						<label id="password1label" for="password"><b>Password</b></label>
						<input id="password1field"type="password" placeholder="" minlength="5" name="password" >
					</div>
								
					<div id="right"> <!-- right aligned items -->
						<label id="lastnamelabel" for="lastName"><b>Last Name</b></label>
						<input type="text" id="lastnamefield" name="LastName" placeholder="">
						<label id="phonenumberlabel" for="phoneNumber"><b>Phone Number</b></label>
						<input type="text" id="phonenumberfield" name="phoneNumber" minlength="10" placeholder="">
						<label id="password2label" for="password"><b>Confirm Password</b></label>
						<input id="password2field" type="password" placeholder="" minlength="5" name="password">
					</div>
					
					<!-- button and link group -->
					<center>
						<div class="buttons">
							<button id="updateAcc" type="submit"><b>UPDATE ACCOUNT</b></button>
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