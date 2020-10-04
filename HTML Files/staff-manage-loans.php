<!-- MANAGE LOANS PAGE -->
<!-- establish connection with db -->
<?php
	session_start();
	
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "689iABj";
	$db = "bookshelf";
	$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
	
	$login_email = $_SESSION["acc_email"];
	$login_password = $_SESSION["acc_pass"];

	$sqlValue = "SELECT * FROM `loans` WHERE "; // need complete sql query for staff loans

?>

<!DOCTYPE html>
<html> 
	<script src="https://kit.fontawesome.com/56b24aa4ed.js" crossorigin="anonymous"></script>
	<head>
		<title>Bookshelf</title> <!-- This is the title of the site that shows up in the tab feel free to change it -->
		<link rel="stylesheet" href="../CSS Files/WebsiteStyling.css"> <!-- Skeleton css file -->
		<link href='https://fonts.googleapis.com/css?family=Armata' rel='stylesheet'> <!-- Google font file -->
		<link rel="icon" type="image/x-icon" href="../Misc Files/logo.ico"/> <!-- icon file -->
	</head>	
	<body>
		<!-- fixed top navigation bar -->
		<header>
			<div class="navigation" > 
				<a onclick="window.location.href='../HTML Files/staff-account.html'"><img src="../Misc Files/logo(colour).png"/><b> Bookshelf</b></a>
				<div id="name">
					<a id="settings" onclick="window.location.href='../HTML Files/staff-account-settings.php'">My Account</a> <!-- linked to settings -->
					<a id="logout" onclick="window.location.href='../index.php'"><i id="logout" class="fas fa-sign-out-alt"></i></a>
				</div>
			</div>
		</header>
		
		<!-- content body of website -->
		<div class="body">
			<section class="contentContainer">
				<h1>Manage my Materials</h1>
				<input type="text" id="search-bar" placeholder="Search" onkeyup="">
				<a href="#"><i id="search-icon" class="fas fa-search"></i></a>
			
				<table>
					<tr>
						<th>Loan ID</th>
						<th>Title</th>
						<th>Author</th>
						<th>Borrow Date</th>
						<th>Due Date</th>
						<th>Overdue?</th>
						<th>Fees</th>
					</tr>
					
					<!-- print all database data into a table -->
					<?php
						if() //result greater than 0
						{
							while() //fetch associate
							{
								echo'<tr>
										<td>'.$.'</td>
									</tr>';
							}
							
						}
						else 
						{
							echo "No current loans.";
						}
					?>
				</table>
			
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