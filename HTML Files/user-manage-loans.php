<!-- USER MANAGE LOANS PAGE -->
<!-- establish connection with db -->
<?php
	session_start();
	
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$db = "bookshelf";
	$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
	
	$login_email = $_SESSION["acc_email"];
	$login_password = $_SESSION["acc_pass"];

	$sqlValue = "SELECT * FROM `loans` WHERE 'email' = $login_email "; // need complete sql query for user loans
	$results = mysqli_query($conn, $sqlValue);

?>

<!DOCTYPE html>
<html> 
	<script src="https://kit.fontawesome.com/56b24aa4ed.js" crossorigin="anonymous"></script>
	<head>
		<title>Bookshelf</title> <!-- This is the title of the site that shows up in the tab feel free to change it -->
		<link rel="stylesheet" href="../CSS Files/WebsiteStyling.css"> <!-- Skeleton css file -->
		<link rel="stylesheet" type="text/css" href="../CSS Files/UserStyling.css"> <!--Styling for user account-->
		<link rel="stylesheet" href="../CSS Files/SearchStyling.css"> <!-- Search css file -->
		<link rel="stylesheet" href="../CSS Files/ManageLoansStyling.css"> <!-- Search css file -->
		<link href='https://fonts.googleapis.com/css?family=Armata' rel='stylesheet'> <!-- Google font file -->
		<link rel="icon" type="image/x-icon" href="../Misc Files/logo.ico"/> <!-- icon file -->
	</head>	
	<body>
		<!-- fixed top navigation bar -->
		<header>
			<div class="navigation" >
				<a onclick="window.location.href='../HTML Files/User Account.html'"><img src="../Misc Files/logo(colour).png"/><b> Bookshelf</b></a>
				<div id="name">
					<a id="settings" onclick="window.location.href='../HTML Files/user-account-settings.php'">My Account</a> <!-- linked to settings -->
					<a id="logout" onclick="window.location.href='../index.php'"><i id="logout" class="fas fa-sign-out-alt"></i></a>
				</div>
			</div>
		</header>
		
		<!-- content body of website -->
		<div class="body">
		<br>
		<br>
		<a id="returnhome" href="../HTML Files/User Account.html"><i class="fas fa-caret-left"></i>&nbsp; &nbsp; Return to Dashboard</a>
			<section class="contentContainer">
				<h1>Manage my Materials</h1>
				<form action="" method=""> <!-- need to write script to search the table below -->
					<div id="search-container">
						<input type="text" id="search-bar" name="query" placeholder="Enter * to view all or search via material title or author"/>
						<button type="submit"><i class="fas fa-search"></i></button>
					</div>
				</form>
			
				<table>
					<tr>
						<th>Loan ID</th>
						<th>Title</th>
						<th>Author</th>
						<th>Borrow Date</th>
						<th>Due Date</th>
						<th>Fees</th>
					</tr>
					
					<!-- print all database data into a table -->
					<?php
						if(mysqli_num_rows($results) > 1 ) //result greater than 0
						{
							while($results->fetch_assoc()) //fetch associate
							{
								echo'<tr>
										<td>'.$row['loan_id'].'</td>
										<td>'.$row['book_title'].'</td>
										<td>'.$row['book_author'].'</td>
										<td>'.$row['borrow_date'].'</td>
										<td>'.$row['due_date'].'</td>
										<td>'.$row['fee'].'</td>
									</tr>';
							}
							
						}
						else 
						{
							echo "<br><br>No current loans.<br><br>";
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