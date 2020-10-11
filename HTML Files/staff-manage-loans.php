<!-- STAFF MANAGE LOANS PAGE -->
<!-- establish connection with db -->
<?php
	session_start();
	
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$db = "bookshelf";
	$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
	
	$login_email = $_SESSION["acc_email"];

	$sqlValue = "SELECT * FROM `loans` WHERE 'email' = $login_email"; // need complete sql query for staff loans
	$results = mysqli_query($conn, $sqlValue);

?>

<!DOCTYPE html>
<html> 
	<script src="https://kit.fontawesome.com/56b24aa4ed.js" crossorigin="anonymous"></script>
	<head>
		<title>Bookshelf</title> <!-- This is the title of the site that shows up in the tab feel free to change it -->
		<link rel="stylesheet" href="../CSS Files/WebsiteStyling.css"> <!-- Skeleton css file -->
		<link rel="stylesheet" type="text/css" href="../CSS Files/StaffStyling.css"> <!--Styling for staff account-->
		<link rel="stylesheet" href="../CSS Files/SearchStyling.css"> <!-- Search css file -->
		<link rel="stylesheet" href="../CSS Files/ManageLoansStyling.css"> <!-- Search css file -->
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
		<br>
		<br>
		<a id="returnhome" href="../HTML Files/staff-account.html"><i class="fas fa-caret-left"></i>&nbsp; &nbsp; Return to Dashboard</a>
			<section class="contentContainer">
				<h1>Manage my Loans</h1>
				<?php
				//session_start();
				//NEED TO WORK OUT HOW TO USE SESSION EMAIL
				//$email = $_SESSION["acc_email"];
				//$email = '"wintersoldier@email.com"'; 
					$location = '"../HTML Files/staff-update-loans.html"'; // NEED TO CHANGE TO BE manage loans FORM FOR USER AND STAFF, AND EDIT FOR ADMIN
					
					$raw_results = mysqli_query($conn, "SELECT * FROM loans  ORDER BY loan_id") or die($conn -> error);
						
					if(mysqli_num_rows($raw_results) > 0){ // if one or more rows are returned do following
					$num = mysqli_num_rows($raw_results);
					echo "<br><p id='message'>There are <b>".$num."</b>&nbspcurrent loans.</p><br>";
						while($results = $raw_results->fetch_assoc()){
						echo "<a id='booktitle' style='cursor:pointer;' onclick='window.location.href=".$location."'><h3>Loan ID: ".$results['loan_id']."</h3></a><p id='details'><b>Title: </b>".$results['book_title']."&nbsp&nbsp&nbsp&nbsp<b>Author: </b>".$results['book_author']."<br><b>Borrow Date: </b>".$results['borrow_date']."&nbsp&nbsp&nbsp&nbsp<b>Due Date: </b>".$results['due_date']."&nbsp&nbsp&nbsp&nbsp<b>Late Fee: $</b>".$results['fee']."</p><br>";
							
						}
						echo "<p id='message'>End of loans.</p><br><br>";
						
					}
					else{ // if there is no matching rows do following
						echo "<br><p id='message'>No loans.</p>";
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