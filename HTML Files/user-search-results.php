<!-- USER SEARCH RESULTS -->

<?php
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$db ="bookshelf";
	$conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die ("Error connecting to database: ". $conn -> error);
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<script src="https://kit.fontawesome.com/56b24aa4ed.js" crossorigin="anonymous"></script>
	<head>
		<title>Bookshelf</title> <!-- This is the title of the site that shows up in the tab feel free to change it -->
		<link rel="stylesheet" href="../CSS Files/WebsiteStyling.css"> <!-- Skeleton css file -->
		<link rel="stylesheet" type="text/css" href="../CSS Files/UserStyling.css"> <!--Styling for user account-->
		<link rel="stylesheet" href="../CSS Files/SearchResultsStyling.css"> <!-- Search css file -->
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
		<!-- return to search -->
		<br>
		<br>
		<a id="returntosearch" href="../HTML Files/User Account.html"><i class="fas fa-caret-left"></i>&nbsp; &nbsp; Return to Dashboard</a>
			<section class="contentContainer">
				<h1 id="searchtitle">Search Results</h1>
				<?php
					$query = $_GET['query']; 
					$location = '"../HTML Files/user-borrow-materials.html"'; // NEED TO CHANGE TO BE BORROW MATERIALS FORM FOR USER AND STAFF, AND EDIT FOR ADMIN
					// gets value sent over search form
					
					$min_length = 1;
					// you can set minimum length of the query if you want
					
					if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then
						
						$query = htmlspecialchars($query); 
						// changes characters used in html to their equivalents, for example: < to &gt;
						
						// $query = mysqli_real_escape_string($conn, $query);
						// makes sure nobody uses SQL injection
						
						if($query == '*'){
							$raw_results = mysqli_query($conn, "SELECT * FROM books ORDER BY book_id") or die($conn -> error);
						} 
						else {
							$raw_results = mysqli_query($conn, "SELECT * FROM books WHERE (`title` LIKE '%".$query."%') OR (`author` LIKE '%".$query."%') ORDER BY book_id") or die($conn -> error);
						}

						if(mysqli_num_rows($raw_results) > 0){ // if one or more rows are returned do following
						$num = mysqli_num_rows($raw_results);
						echo "<br><p id='message'>There are <b>".$num."</b>&nbspmaterials that match the search criteria.</p><br>";
							while($results = $raw_results->fetch_assoc()){
							// $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
								if($results['type'] == 'Fiction'){
									echo "<a id='booktitle' style='cursor:pointer;' onclick='window.location.href=".$location."'><h3>".$results['title']." [Book ID: ".$results['book_id']."]</h3></a><p id='details'><b>By: </b>".$results['author']."&nbsp&nbsp&nbsp&nbsp<b>Type: </b>".$results['type']."&nbsp&nbsp&nbsp&nbsp<b>Topic: </b>".$results['fiction_topic']."&nbsp&nbsp&nbsp&nbsp<b>ISBN: </b>".$results['ISBN']."</p><br>";
								}
								else {
									echo "<a id='booktitle' style='cursor:pointer;' onclick='window.location.href=".$location."'><h3>".$results['title']." [Book ID: ".$results['book_id']."]</h3></a><p id='details'><b>By: </b>".$results['author']."&nbsp&nbsp&nbsp&nbsp<b>Type: </b>".$results['type']."&nbsp&nbsp&nbsp&nbsp<b>Topic: </b>".$results['non_fiction_topic']."&nbsp&nbsp&nbsp&nbsp<b>ISBN: </b>".$results['ISBN']."</p><br>";
								}
							}
							echo "<p id='message'>End of search results.</p><br><br>";
							
						}
						else{ // if there is no matching rows do following
							echo "<br><p id='message'>No results.</p>";
						}
						
					}
					else{ // if query length is less than minimum
						echo "<br><p id='message'>Please enter a valid search parameter.</p>";
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