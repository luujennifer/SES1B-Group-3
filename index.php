<!-- login page -->

<!DOCTYPE html>
<html> 
	<script src="https://kit.fontawesome.com/56b24aa4ed.js" crossorigin="anonymous"></script>
	<head>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!-- Imports JQuery librry -->
        <script src="Javascript%20Files/KeepFloating.js"></script> <!-- Script for keeping labels afloat -->

		<title>Bookshelf</title> <!-- This is the title of the site that shows up in the tab feel free to change it -->
		<link rel="stylesheet" href="CSS Files/WebsiteStyling.css"> <!-- Skeleton css file -->
		<link rel="stylesheet" href="CSS Files/LoginStyling.css"> <!-- Login css file -->
        <link rel="stylesheet" href="CSS Files/FloatingLabels.css"> <!-- Floating labels css file -->
		<link href='https://fonts.googleapis.com/css?family=Armata' rel='stylesheet'> <!-- Google font file -->
		<link rel="icon" type="image/x-icon" href="Misc Files/logo.ico"/> <!-- icon file -->
	</head>	
	<body>
		<!-- fixed top navigation bar -->
		<header style="position: fixed; z-index: 100;">
			<div class="navigation" > 
				<a onclick="window.location.href='index.php'"><img src="Misc Files/logo(colour).png"/><b> Bookshelf</b></a>
			</div>
		</header>
		
		<!-- content body of website -->
		<div class="body">
			<section class="contentContainer">
				<form class="login" action="PHP Files/process.php" method="POST">
					<center>
						<label for="loginTitle" id="loginTitle"><b>Welcome Back!</b></label>
						<p id="signinText">Sign in to continue where you left off.</p>
					</center>
					
					<br>

                    <div class="floating-label-wrap">
                        <input type="email" id="email" pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                        <label for="email" class="floating-label">Email</label>
                    </div>
                    <div class="floating-label-wrap">
                        <input type="password" id="psw" required>
                        <label for="psw" class="floating-label">Password</label>
                    </div>
					
					<br>
					
					<div class="optionsGroup">
						<label><input class="rememberMe" type="checkbox" name="rememberMe">	Remember me</label>
						<span class="forgotPassword"><a href="HTML Files/forgot-password.html">Forgot password?</a></span>
					</div>
					
					<br>
					
					<button id="loginBtn" type="submit" value="submit"><b>Login</b></button>
					<a id="signupBtn" href="HTML%20Files/bookshelf-signup.html"><b>Sign Up</b></a>
				</form>
			
			</section>
		</div>
		
		<!-- fixed footer bar -->
		<div class="footer" style="position: fixed; z-index: 100;">
			<div class="etcDetails">
				<a href="https://github.com/luujennifer/SES1B-Group-3"><i class="fab fa-github"></i> GitHub</a>
				<a href="https://drive.google.com/drive/u/2/folders/0ALuTuEVm4VA2Uk9PVA"><i class="fab fa-google-drive"></i> Google Drive</a>
			</div>
			
			<p id="copyRight">Created by Group 3 for Software Engineering Studio 1B</p>
		</div>
	</body>
</html>