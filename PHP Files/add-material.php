<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db ="bookshelf";
$conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die ("Error connecting to database: ". $conn -> error);

if(isset($_POST['submit'])){
    $bookTitle = $_POST['bookTitle'];
    $bookType = $_POST['bookType'];
    $author = $_POST['author'];
    $publisher = $_POST['publisher'];
    $pubPlace = $_POST['pubPlace'];
    $pubDate = $_POST['pubDate'];
    $isbn = $_POST['isbn'];
    $genre = $_POST['genre'];
    $format = $_POST['format'];
    $copyNo = $_POST['copyNo'];
    $renewNo = $_POST['renewNo'];
    $fineAmount = $_POST['fineAmount'];


    $sql = "INSERT INTO books (title, type, author, publisher, place_of_publication, date_of_publication,
                                ISBN, fiction_topic, format, copies, available) 
        VALUES ('$bookTitle', '$bookType', '$author','$publisher', '$pubPlace', '$pubDate', '$isbn', '$genre', '$format',
                    '$copyNo', '$copyNo')";

    if(!mysqli_query($conn, $sql)) {
        echo "<script>alert('Failed to add material, please try again.')</script>";
    }
    else {
        echo "<script>alert('Material added successfully.')</script>";
        header('Location: manage-materials.php');
    }
}

?>

<!DOCTYPE html>
<html>
<script src="https://kit.fontawesome.com/56b24aa4ed.js" crossorigin="anonymous"></script>
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!-- Imports JQuery librry -->
    <script src="../Javascript%20Files/KeepFloating.js"></script> <!-- Script for keeping labels afloat -->

    <title>Add Material</title> <!-- This is the title of the site that shows up in the tab feel free to change it -->
    <link rel="stylesheet" href="../CSS Files/WebsiteStyling.css"> <!-- Skeleton css file -->
    <link rel="stylesheet" href="../CSS Files/AddMaterialStyling.css"> <!-- Add Material css file -->
	<link rel="stylesheet" type="text/css" href="../CSS Files/AdminStyling.css"> <!--Styling for admin account-->
    <link rel="stylesheet" href="../CSS Files/FloatingLabels.css"> <!-- Floating labels css file -->
    <link href='https://fonts.googleapis.com/css?family=Armata' rel='stylesheet'> <!-- Google font file -->
    <link rel="icon" type="image/x-icon" href="../Misc Files/logo.ico"/> <!-- Icon file -->

</head>
<body>
<!-- fixed top navigation bar -->
<header style="position: fixed; z-index: 100;">
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
		<a id="returnhome" href="../PHP Files/manage-materials.php"><i class="fas fa-caret-left"></i>&nbsp; &nbsp; Return to Manage Materials</a>
    <section class="contentContainer">

        <form class="add" action="../PHP Files/add-material-script.php" method="POST">
            
            <h1>Add Material</h1>
			<p>Fill out the form below to add new material to the catalogue.</p>

            <div class="inputFields">
                <div class="floating-label-wrap">
                    <input type="text" id="bookTitle" name="bookTitle" required>
                    <label for="bookTitle" class="floating-label">Book Title</label>
                </div>
                
                <div class="floating-label-wrap">
                    <input type="text" id="author" name="author" pattern="[A-Z][a-zA-Z-\s]{1,}" required>
                    <label for="author" class="floating-label">Author</label>
                </div>

                <div class="floating-label-wrap">
                    <input type="text" id="publisher" name="publisher" pattern="[A-Z][a-zA-Z-\s]{1,}" required>

                    <label for="publisher" class="floating-label">Publisher</label>
                </div>
                <div class="floating-label-wrap">
                    <input type="text" id="pubPlace" name="pubPlace" pattern="[A-Z][a-zA-Z-\s]{1,}">

                    <label for="pubPlace" class="floating-label">Place of Publication</label>
                </div>
                <div class="floating-label-wrap">
                    <input type="date" id="pubDate" name="pubDate">

                    <label for="pubDate" class="floating-label">Date of Publication</label>
                </div>

                <div class="floating-label-wrap">
                    <input type="text" id="isbn" name="isbn" pattern="[0-9]{13}" required>
                    <label for="isbn" class="floating-label">ISBN</label>
                </div>
				
				<div class="floating-label-wrap">
                    <select name="type" id="bookType" required>
                        <option value="" disabled selected hidden></option>
                        <option value="Fiction">Fiction</option>
                        <option value="Non-Fiction">Non-Fiction</option>
                    </select>
                    <label for="bookType" class="floating-label">Book Type</label>
                </div>
				
				<div class="floating-label-wrap">
                    <select name="non-fiction-genre" id="format" required>
                        <option value="" disabled selected hidden></option>
						<option value="Not Applicable">Not Applicable</option>
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
                    </select>
                    <label for="bookType" class="floating-label">Non-Fiction Genre</label>
                </div>

				
				<div class="floating-label-wrap">
                    <select name="fiction-genre" id="format" required>
                        <option value="" disabled selected hidden></option>
						<option value="Not Applicable">Not Applicable</option>
                        <option value="Modern & Contemporary Fiction">Modern &amp; Contemporary Fiction</option>
						<option value="Poetry & Drama">Poetry &amp; Drama</option>
						<option value="Romance">Romance</option>
						<option value="Crime">Crime</option>
						<option value="Classic Fiction">Classic Fiction</option>
						<option value="Fantasy">Fantasy</option>
						<option value="Adventure Fiction">Adventure Fiction</option>
						<option value="Science Fiction">Science Fiction</option>
						<option value="Historical Fiction">Historical Fiction</option>
						<option value="Horror & Paranormal Fiction">Horror &amp; Paranormal Fiction</option>
						<option value="Graphic Novels">Graphic Novels</option>
						<option value="Young Adult">Young Adult</option>
						<option value="Manga">Manga</option>
						<option value="Dystopian">Dystopian</option>
                    </select>
                    <label for="bookType" class="floating-label">Fiction Genre</label>

                </div>
                
				<div class="floating-label-wrap">
                    <select name="format" id="format" required>
                        <option value="" disabled selected hidden></option>
                        <option value="Hard Copy">Hard Copy</option>
                        <option value="E-Book">E-Book</option>
                    </select>
                    <label for="bookType" class="floating-label">Format</label>
                </div>
                <div class="floating-label-wrap">
                    <input type="text" id="copyNo" name="copyNo" pattern="[0-9]{1,}" required>
                    <label for="copyNo" class="floating-label">Number of Copies</label>
                </div>
            </div>

            <!-- Button and return login group -->

            <button type="submit" id="addMaterialBtn" value="submit" onclick=""><b>Add Material</b></button>
            <button type="button" id="cancelBtn" onclick="window.location.href='../PHP Files/manage-materials.php'"><b>Cancel</b></button>

            <br>
            <br>
            <br>
			<br>
        </form>
    </section>
</div>

<!-- fixed footer bar -->
<div class="footer" style="position: fixed; z-index: 100;">
    <div class="etcDetails">
        <a href="https://github.com/luujennifer/SES1B-Group-3"><i class="fab fa-github"></i> GitHub</a>
        <a href="https://drive.google.com/drive/u/2/folders/0ALuTuEVm4VA2Uk9PVA"><i class="fab fa-google-drive"></i> Google Drive</a>
    </div>

    <p id="copyRight">Created by Group 3 for Software Engineering Studio 1B</p>
</div>
</body>
</html>
