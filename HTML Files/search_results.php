<!-- search results page -->

<?php
	// mysql_connect("localhost", "root", "689iABj") or die("Error connecting to database: ".mysql_error());
	/*
		localhost - it's location of the mysql server, usually localhost
		root - your username
		third is your password
		
		if connection fails it will stop loading the page and display an error
	*/
	
	// mysql_select_db("bookshelf") or die(mysql_error());
	/* tutorial_search is the name of database we've created */
	
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "689iABj";
	$db ="bookshelf";
	$conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die ("Error connecting to database: ". $conn -> error);
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<script src="https://kit.fontawesome.com/56b24aa4ed.js" crossorigin="anonymous"></script>
	<head>
		<title>Bookshelf</title> <!-- This is the title of the site that shows up in the tab feel free to change it -->
		<link rel="stylesheet" href="WebsiteStyling.css"> <!-- Skeleton css file -->
		<link rel="stylesheet" href="SearchStyling.css"> <!-- Search css file -->
		<link href='https://fonts.googleapis.com/css?family=Armata' rel='stylesheet'> <!-- Google font file -->
		<link rel="icon" type="image/x-icon" href="/logo.ico"/> <!-- icon file -->
	</head>	
	<body>
		<!-- fixed top navigation bar -->
		<header>
			<div class="navigation" > 
				<a onclick="window.location.href='index.html'"><img src="/logo(colour).png"/><b> Bookshelf</b></a>
				<div id="name">
					<p><b>Jane Smith</b><br>Admin</p>
					<a id="settings" onclick="window.location.href='admin-account-settings.php'"><i class="fas fa-cog"></i></a>
				</div>
			</div>
		</header>
		
		<!-- content body of website -->
		<div class="body">
			<section class="contentContainer">
			<!-- return to search -->
			<a id="returntosearch" href="../HTML Files/search.php"><i class="fas fa-caret-left"></i><!-- this is a non breaking space --> &nbsp; &nbsp; Return to Search</a>
<?php
	$query = $_GET['query']; 
	// gets value sent over search form
	
	$min_length = 1;
	// you can set minimum length of the query if you want
	
	if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then
		
		// $query = htmlspecialchars($query); 
		// changes characters used in html to their equivalents, for example: < to &gt;
		
		// $query = mysqli_real_escape_string($conn, $query);
		// makes sure nobody uses SQL injection
		
		$raw_results = mysqli_query($conn, "SELECT * FROM books
			WHERE (`title` LIKE '%".$query."%')") or die($conn -> error);
			
		// * means that it selects all fields, you can also write: `id`, `title`, `text`
		// articles is the name of our table
		
		// '%$query%' is what we're looking for, % means anything, for example if $query is Hello
		// it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$query'
		// or if you want to match just full word so "gogohello" is out use '% $query %' ...OR ... '$query %' ... OR ... '% $query'
		
		//$num = mysqli_num_rows($raw_results)
		if(mysqli_num_rows($raw_results) > 0){ // if one or more rows are returned do following
		$num = mysqli_num_rows($raw_results);
		echo "<br><br><br>There are ".$num."&nbspmaterials that match the search criteria.<br>";
			while($results = $raw_results->fetch_assoc()){
			// $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
			
				echo "<br><br><br><p><h3 id='booktitle'>".$results['title']."</h3><b>By: </b>".$results['author']."&nbsp&nbsp&nbsp&nbsp<b>Topic: </b>".$results['topic']."&nbsp&nbsp&nbsp&nbsp<b>Type: </b>".$results['type']."</p>";
				// posts results gotten from database(title and text) you can also show id ($results['id'])
			}
			
		}
		else{ // if there is no matching rows do following
			echo "<br><br><br>No results";
		}
		
	}
	else{ // if query length is less than minimum
		echo "<br><br><br>Minimum length is ".$min_length;
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