<!-- MANAGE LOANS PAGE -->
<!-- establish connection with db -->
<?php
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "689iABj";
	$db = "bookshelf";
	$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

	$sqlValue = "SELECT * FROM `loans` WHERE account_type = '$' AND firstname ='$' and lastname ='$' "; // need to match up firstname and lastname and account type

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
				<a onclick="window.location.href='index.html'"><img src="../Misc Files/logo(colour).png"/><b> Bookshelf</b></a>
				<div id="name">
					<p><b>Lisa Ron</b><br>Student</p>
					<a id="settings" onclick="window.location.href='user-account-settings.php'"><i class="fas fa-cog"></i></a> <!-- need to link to settings page -->
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
						<th> </th>
					</tr>
					
					<!-- print all database data into a table -->
					<?php
						if()
						{
							while()
							{
								echo'<tr>
										<td>'.$.'</td>
									</tr>';
							}
							
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