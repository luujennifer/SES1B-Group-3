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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script>
			$(document).ready(function() {
				$('#type').on('change', function (e) {
					$('#topic').val(' ');
					var endingChar = $(this).val().split(' ').pop();
					var selected = $( '#type' ).val();
					$('#topic option').addClass('show');
					
					$('#topic option[value^='+selected+']').toggleClass('show');
				});
			});
		</script>
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
					<br>
					<label for="searchtitle" id="searchtitle"><b>Search for Materials</b></label>
					<p>Enter the material title or author to search, alternatively filter results by parameters.</p>
					<br>
					<input type="text" id="search-bar" name="query" placeholder=""/>
					<label id="bookTypeLabel" for="bookType"><b>Book Type</b></label><br>
					<div id="type">
						<select id="selectBox">
							<option value="" disabled selected hidden>Choose Book Type</option>
							<option value="Fiction">Fiction</option>
							<option value="Non-Fiction">Non-Fiction</option>
						</select>
					</div>
					<label id="nonfictionTopicLabel" for="nonfictionTopic"><b>Book Topic</b></label><br>
					<div id="type">
						<select id="selectBox">
							<option value="" disabled selected hidden>Choose Book Topic</option>
							<option value="Architecture">Architecture</option>
							<option value="Built Environment">Built Environment</option>
							<option value="Business">Business</option>
							<option value="Communication">Communication</option>
							<option value="Design">Design</option>
							<option value="Education">Education</option>
							<option value="Engineering">Engineering</option>
							<option value="Health">Health</option>
							<option value="Indigenous Studies">Indigenous Studies</option>
							<option value="Information Technology">Information Technology</option>
							<option value="International Studies">International Studies</option>
							<option value="Law">Law</option>
							<option value="News">News</option>
							<option value="Science">Science</option>
							<option value="Not Applicable">Not Applicable</option>
						</select>
					</div>
					<label id="fictionTopicLabel" for="fictionTopic"><b>Book Topic</b></label><br>
					<div id="type">
						<select id="selectBox">
							<option value="" disabled selected hidden>Choose Book Topic</option>
							<option value="Fiction">Modern &amp; Contemporary Fiction</option>
							<option value="Non-Fiction">Poetry &amp; Drama</option>
							<option value="Fiction">Romance</option>
							<option value="Non-Fiction">Crime</option>
							<option value="Fiction">Classic Fiction</option>
							<option value="Non-Fiction">Fantasy</option>
							<option value="Fiction">Adventure Fiction</option>
							<option value="Non-Fiction">Science Fiction</option>
							<option value="Non-Fiction">Historical Fiction</option>
							<option value="Non-Fiction">Horror &amp; Paranormal Fiction</option>
							<option value="Non-Fiction">Graphic Novels</option>
							<option value="Non-Fiction">Young Adult</option>
							<option value="Non-Fiction">Manga</option>
							<option value="Non-Fiction">Dystopian</option>
							<option value="Non-Fiction">Not Applicable</option>
						</select>
					</div>
					<center><button id="searchbtn" type="submit"><b>SEARCH</b></button></center>

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