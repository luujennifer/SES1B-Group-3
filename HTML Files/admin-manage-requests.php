<!-- MANAGE REQUEST PAGE -->
<!-- establish connection with db -->
<?php
	session_start();
	
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$db = "bookshelf";
	$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
	
	$login_email = $_SESSION["acc_email"];

	$sqlValue = "SELECT * FROM `book_request`"; 
	$results = mysqli_query($conn, $sqlValue);

?>

<!DOCTYPE html>
<html> 
	<script src="https://kit.fontawesome.com/56b24aa4ed.js" crossorigin="anonymous"></script>
	<head>
		<title>Bookshelf</title> <!-- This is the title of the site that shows up in the tab feel free to change it -->
		<link rel="stylesheet" href="../CSS Files/WebsiteStyling.css"> <!-- Skeleton css file -->
		<link rel="stylesheet" type="text/css" href="../CSS Files/AdminStyling.css"> <!--Styling for staff account-->
		<link rel="stylesheet" href="../CSS Files/SearchStyling.css"> <!-- Search css file -->
		<link rel="stylesheet" href="../CSS Files/SearchResultsStyling.css"> <!-- Search css file -->
		<link rel="stylesheet" href="../CSS Files/ManageRequestsStyling.css"> <!-- Search css file -->
		<link href='https://fonts.googleapis.com/css?family=Armata' rel='stylesheet'> <!-- Google font file -->
		<link rel="icon" type="image/x-icon" href="../Misc Files/logo.ico"/> <!-- icon file -->
	</head>	
	<body>
		<!-- fixed top navigation bar -->
		<header>
        <div class="navigation" > 
				<a onclick="window.location.href='../HTML Files/admin-account.html'"><img src="../Misc Files/logo(colour).png"/><b> Bookshelf</b></a>
				<div id="name">
					<a id="settings" onclick="window.location.href='../HTML Files/admin-account-settings.php'">My Account</a> <!-- linked to settings -->
					<a id="logout" onclick="window.location.href='../index.php'"><i id="logout" class="fas fa-sign-out-alt"></i></a>
				</div>
			</div>
		</header>
		
		<!-- content body of website -->
		<div class="body">
		<br>
		<br>
		<a id="returnhome" href="../HTML Files/admin-account.html"><i class="fas fa-caret-left"></i>&nbsp; &nbsp; Return to Dashboard</a>
			<section class="contentContainer">
				<h1 id="manageRequestsTitle">Manage Material Requests</h1>
				<?php
					$location = '"index.html"'; // NEED TO CHANGE TO BE edit MATERIALS FORM 
					
					$raw_results = mysqli_query($conn, "SELECT * FROM book_request ORDER BY request_id") or die($conn -> error);
						

						if(mysqli_num_rows($raw_results) > 0){ // if one or more rows are returned do following
						$num = mysqli_num_rows($raw_results);
						echo "<p id='message'>There are <b>".$num."</b>&nbspmaterial requests.</p><br>";
							while($results = $raw_results->fetch_assoc()){
							// $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
								
								echo "<a id='booktitle' style='cursor:pointer;' onclick='window.location.href=".$location."'><h3>".$results['title']."</h3></a><p id='details'><b>By: </b>".$results['author']."&nbsp&nbsp&nbsp&nbsp<b>Type: </b>".$results['type']."&nbsp&nbsp&nbsp&nbsp<b>ISBN: </b>".$results['ISBN']."</p><br>";
								
								
							}
							echo "<p id='message'>End of material requests.</p><br><br>";
							
						}
						else{ // if there is no matching rows do following
							echo "<br><p id='message'>No material requests.</p>";
						}
						
				?>
			
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