<!-- search form page -->

<!DOCTYPE html>
<html> 
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
					<a id="settings" onclick="window.location.href='admin-account-settings.php'"><i class="fas fa-cog"></i></a> <!-- need to link to settings page -->
				</div>
			</div>
		</header>
		
		<!-- content body of website -->
		<div class="body">
			<section class="contentContainer">
				<form class="search" action="search_results.php" method="GET">
					<input type="text" id="search-bar" name="query" placeholder=""/>
					<input type="submit" value="Search"/>
					<!-- <a onclick="searchPosts(0)" href="#"><i id="search-icon" class="fas fa-search"></i></a> -->
					<!-- <button onclick="searchPosts(0)" href="#"><i id="search-icon" class="fas fa-search"></i>Search</button> -->
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