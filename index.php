<!-- login page -->

<!DOCTYPE html>
<html> 
	<script src="https://kit.fontawesome.com/56b24aa4ed.js" crossorigin="anonymous"></script>
	<head>
		<title>Bookshelf</title> <!-- This is the title of the site that shows up in the tab feel free to change it -->
		<link rel="stylesheet" href="CSS Files/WebsiteStyling.css"> <!-- Skeleton css file -->
		<link rel="stylesheet" href="CSS Files/LoginStyling.css"> <!-- Login css file -->
		<link href='https://fonts.googleapis.com/css?family=Armata' rel='stylesheet'> <!-- Google font file -->
		<link rel="icon" type="image/x-icon" href="Misc Files/logo.ico"/> <!-- icon file -->
	</head>	
	<body>
		<!-- fixed top navigation bar -->
		<header>
			<div class="navigation" > 
				<a onclick="window.location.href='index.html'"><img src="Misc Files/logo(colour).png"/><b> Bookshelf</b></a>
			</div>
		</header>
		
		<!-- content body of website -->
		<div class="body">
			<section class="contentContainer">
				<form class="login" action="HTML Files/process.php" method="POST"> 
					<center>
						<label for="loginTitle" id="loginTitle"><b>Welcome Back!</b></label>
						<p id="signinText">Sign in to continue where you left off.</p>
					</center>
					
					<br>

					<input type="email" placeholder="Email" name="email">
					<input type="password" placeholder="Password" name="password">
					
					<br>
					
					<div class="optionsGroup">
						<label><input class="rememberMe" type="checkbox" name="rememberMe">	Remember me</label>
						<span class="forgotPassword"><a href="HTML Files/forgot-password.html">Forgot password?</a></span>
					</div>
					
					<br>
					
					<button id="loginBtn" type="submit"><b>LOGIN</b></button>
					<a id="signupBtn" href="HTML Files/bookshelf-signup.html"><b>SIGN UP</b></a>
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