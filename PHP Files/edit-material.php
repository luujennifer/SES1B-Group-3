<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db ="bookshelf";
$conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die ("Error connecting to database: ". $conn -> error);

$id = $_POST['id'];

$sql = "SELECT * FROM books WHERE book_id = '$id'";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>
    <script src="https://kit.fontawesome.com/56b24aa4ed.js" crossorigin="anonymous"></script>
    <head>
        <title>Bookshelf</title> <!-- This is the title of the site that shows up in the tab feel free to change it -->
        <link rel="stylesheet" href="../CSS Files/WebsiteStyling.css"> <!-- Skeleton css file -->
        <link rel="stylesheet" type="text/css" href="../CSS Files/EditMaterialStyling.css"> <!--Styling for admin account-->
        <link rel="stylesheet" href="../CSS Files/SearchStyling.css"> <!-- Search css file -->
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
            <section class="contentContainer">

                <h1 class="welcomeMessage">Welcome back!</h1>
                <form action="admin-search-results.php" method="GET">

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