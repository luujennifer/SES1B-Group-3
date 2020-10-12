<?php
    session_start();
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "bookshelf";
    $port = "81";

    $conn = new mysqli($dbhost, $dbuser, $dbpass, $db);
    if(!$conn){
        echo "Connection error: " .mysqli_error();
    }

    $sql = "SELECT * FROM books ORDER BY book_id";
    $result = mysqli_query($conn, $sql);
    $materials = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result);
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<script src="https://kit.fontawesome.com/56b24aa4ed.js" crossorigin="anonymous"></script>
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!-- Imports JQuery librry -->
    <script src="../Javascript%20Files/KeepFloating.js"></script> <!-- Script for keeping labels afloat -->

    <title>Bookshelf</title> <!-- This is the title of the site that shows up in the tab feel free to change it -->
    <link rel="stylesheet" href="../CSS Files/WebsiteStyling.css"> <!-- Skeleton css file -->
    <link rel="stylesheet" href="../CSS Files/AddMaterialStyling.css"> <!-- Add Material css file -->
    <link rel="stylesheet" href="../CSS Files/FloatingLabels.css"> <!-- Floating labels css file -->
    <link href='https://fonts.googleapis.com/css?family=Armata' rel='stylesheet'> <!-- Google font file -->
    <link rel="icon" type="image/x-icon" href="../Misc Files/logo.ico"/> <!-- Icon file -->

</head>
<body>
<!-- fixed top navigation bar -->
<header style="position: fixed; z-index: 100;">
    <div class="navigation" >
        <a onclick="window.location.href='../index.php'"><img src="../Misc Files/logo(colour).png"/><b> Bookshelf</b></a>
        <div id="name">
            <p><b>Jane Smith</b><br>Admin</p>
            <a id="settings" onclick="window.location.href='../HTML%20Files/admin-account-settings.php'"><i class="fas fa-cog"></i></a> <!-- need to link to settings page -->
        </div>
    </div>
</header>

<!-- content body of website -->
<div class="body">
    <section class="contentContainer">
        <form class="add" action="" method="POST">
            <br>
            <label class="title"><b>Add Material</b></label>
            <div class="inputFields">
                <div class="floating-label-wrap">
                    <input type="text" id="bookTitle" name="bookTitle" pattern="[A-Z][a-zA-Z-\s]{1,}" required>
                    <label for="bookTitle" class="floating-label">Book Title</label>
                </div>
                <div class="floating-label-wrap">
                    <select id="bookType" required>
                        <option value="" disabled selected hidden></option>
                        <option value="fiction">Fiction</option>
                        <option value="non-fiction">Non-Fiction</option>
                    </select>
                    <label for="bookType" class="floating-label">Book Type</label>
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
                    <input type="text" id="pubDate" name="pubDate">

                    <label for="pubDate" class="floating-label">Date of Publication</label>
                </div>

                <div class="floating-label-wrap">
                    <input type="text" id="isbn" name="isbn" pattern="[0-9]{13}" required>
                    <label for="isbn" class="floating-label">ISBN</label>
                </div>
                <div class="floating-label-wrap">
                    <input type="text" id="genre" name="genre" pattern="[A-Z][a-zA-Z-\s]{1,}" required>
                    <label for="genre" class="floating-label">Genre</label>
                </div>
                <div class="floating-label-wrap">
                    <input type="text" id="format" name="format" pattern="[A-Z][a-zA-Z-\s]{1,}" required>
                    <label for="format" class="floating-label">Format</label>
                </div>
                <div class="floating-label-wrap">
                    <input type="text" id="copyNo" name="copyNo" pattern="[1-9]([0-9])" required>
                    <label for="copyNo" class="floating-label">Number of Copies</label>
                </div>
                <div class="floating-label-wrap">
                    <input type="text" id="renewNo" name="renewNo" pattern="[0-9]{1,}" required>
                    <label for="renewNo" class="floating-label">Number of Renewals</label>
                </div>
                <div class="floating-label-wrap">
                    <input type="text" id="fineAmount" name="fineAmount" pattern="^\d+(\.\d{1,2})?$" required>
                    <label for="fineAmount" class="floating-label">Fine Amount</label>
                </div>
            </div>

            <!-- Button and return login group -->
            <button type="submit" id="addMaterialBtn" value="Submit" onclick=""><b>Add Material</b></button>
            <button type="button" id="cancelBtn" onclick="window.location.href='../PHP Files/manage-materials.php'"><b>Cancel</b></button>
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
