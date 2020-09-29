<!-- search form page -->

<!DOCTYPE html>
<html> 
	<script src="https://kit.fontawesome.com/56b24aa4ed.js" crossorigin="anonymous"></script>
	<head>
		<title>Bookshelf</title> <!-- This is the title of the site that shows up in the tab feel free to change it -->
		<link rel="stylesheet" href="../CSS%20Files/WebsiteStyling.css"> <!-- Skeleton css file -->
		<link rel="stylesheet" href="../CSS%20Files/SearchStyling.css"> <!-- Search css file -->
		<link href='https://fonts.googleapis.com/css?family=Armata' rel='stylesheet'> <!-- Google font file -->
		<link rel="icon" type="image/x-icon" href="../Misc Files/logo.ico"/> <!-- icon file -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script>
			$(document).ready(function() {

			  // Save all selects' id in an array 
			  // to determine which select's option and value would be changed
			  // after you select an option in another select.
			  var selectors = ['category', 'topic'];

			  $('#type').on('change', function() {
				var index = selectors.indexOf(this.id);
				var value = this.value;

				// check if is the last one or not
				if (index < selectors.length - 1) {
				  var next = $('#' + selectors[index + 1]);

				  // Show all the options in next select
				  $(next).find('option').show();
				  if (value != "") {
					// if this select's value is not empty
					// hide some of the options 
					$(next).find('option[data-value!=' + value + ']').hide();
				  }
				  
				  // set next select's value to be the first option's value 
				  // and trigger change()
				  $(next).val($(next).find("option:first").val()).change();
				}
			  })
			});
		</script>
	</head>	
	<body>
		<!-- fixed top navigation bar -->
		<header>
			<div class="navigation" > 
				<a onclick="window.location.href='../index.php'"><img src="../Misc Files/Logo(Colour).png"/><b> Bookshelf</b></a>
				<div id="name">
					<p><b>Jane Smith</b><br>Admin</p>
					<a id="settings" onclick="window.location.href='../HTML%20Files/admin-account-settings.php'"><i class="fas fa-cog"></i></a> <!-- need to link to settings page -->
				</div>
			</div>
		</header>
		
		<!-- content body of website -->
		<div class="body">
			<section class="contentContainer">
				<form class="search" action="search_results.php" method="GET">
					<br>
					<label for="searchtitle" id="searchtitle"><b>Search for Materials</b></label>
					<p>Type to search or enter * to view all materials.</p>
					<input type="text" id="search-bar" name="query" placeholder="Enter the material title or author to search"/>

					<p>Or filter by category.</p>
					<input type="radio" name="category" value="Fiction">Fiction</input>
					<input type="radio" name="category" value="Non-Fiction">Non-Fiction</input>
					<!--<center>-->
						<!--<div>-->
							<!--<div id="type">
								<select id="selectBox" name="category">
									<option value="" disabled selected hidden>Choose Category</option>
									<option value="Fiction">Fiction</option>
									<option value="Non-Fiction">Non-Fiction</option>
								</select>

							</div>-->
							<!--<div id="type">

								<select id="selectBox" name="topic">
									<option data-value="Non-Fiction" value="" disabled selected hidden>Choose Topic</option>
									<option data-value="Non-Fiction" value="Architecture">Architecture</option>
									<option data-value="Non-Fiction" value="Built Environment">Built Environment</option>
									<option data-value="Non-Fiction" value="Business">Business</option>
									<option data-value="Non-Fiction" value="Communication">Communication</option>
									<option data-value="Non-Fiction" value="Design">Design</option>
									<option data-value="Non-Fiction" value="Education">Education</option>
									<option data-value="Non-Fiction" value="Engineering">Engineering</option>
									<option data-value="Non-Fiction" value="Health">Health</option>
									<option data-value="Non-Fiction" value="Indigenous Studies">Indigenous Studies</option>
									<option data-value="Non-Fiction" value="Information Technology">Information Technology</option>
									<option data-value="Non-Fiction" value="International Studies">International Studies</option>
									<option data-value="Non-Fiction" value="Law">Law</option>
									<option data-value="Non-Fiction" value="News">News</option>
									<option data-value="Non-Fiction" value="Science">Science</option>
									<option data-value="Fiction" value="Modern & Contemporary Fiction">Modern &amp; Contemporary Fiction</option>
									<option data-value="Fiction" value="Poetry & Drama">Poetry &amp; Drama</option>
									<option data-value="Fiction" value="Romance">Romance</option>
									<option data-value="Fiction" value="Crime">Crime</option>
									<option data-value="Fiction" value="Classic Fiction">Classic Fiction</option>
									<option data-value="Fiction" value="Fantasy">Fantasy</option>
									<option data-value="Fiction" value="Adventure Fiction">Adventure Fiction</option>
									<option data-value="Fiction" value="Science Fiction">Science Fiction</option>
									<option data-value="Fiction" value="Historical Fiction">Historical Fiction</option>
									<option data-value="Fiction" value="Horror & Paranormal Fiction">Horror &amp; Paranormal Fiction</option>
									<option data-value="Fiction" value="Graphic Novels">Graphic Novels</option>
									<option data-value="Fiction" value="Young Adult">Young Adult</option>
									<option data-value="Fiction" value="Manga">Manga</option>
									<option data-value="Fiction" value="Dystopian">Dystopian</option>
								</select>
							</div> -->
						<!--</div>-->
					<!--</center>-->
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