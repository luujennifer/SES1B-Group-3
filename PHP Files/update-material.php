<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db ="bookshelf";
$conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die ("Error connecting to database: ". $conn -> error);

if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $sql = "SELECT * FROM books WHERE book_id = '$id'";
    $result = mysqli_query($conn, $sql) or die($conn -> error);
    $material = mysqli_fetch_assoc($result);

    $genre = '';
    if($material['category'] === 'Fiction'){
        $genre = $material['fiction_topic'];
    }
    else{
        $genre = $material['non_fiction_topic'];
    }

    mysqli_free_result($result);
    mysqli_close($conn);
}


?>

<!DOCTYPE html>
<html>
<script src="https://kit.fontawesome.com/56b24aa4ed.js" crossorigin="anonymous"></script>
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!-- Imports JQuery librry -->
    <script src="../Javascript%20Files/KeepFloating.js"></script> <!-- Script for keeping labels afloat -->

    <title>Update Material</title> <!-- This is the title of the site that shows up in the tab feel free to change it -->
    <link rel="stylesheet" href="../CSS Files/WebsiteStyling.css"> <!-- Skeleton css file -->
    <link rel="stylesheet" href="../CSS%20Files/UpdateMaterialStyling.css"> <!-- Update Material css file -->
    <link rel="stylesheet" type="text/css" href="../CSS Files/AdminStyling.css"> <!--Styling for user account-->
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
<a id="returnhome" href="../PHP Files/manage-materials.php"><i class="fas fa-caret-left"></i>&nbsp; &nbsp; Return to Materials</a>
    <section class="contentContainer">
        <form class="update" action="../PHP Files/save-changes.php" method="POST">
            <br>
            <h1>Update Material</h1>
            <p>Update the number of copies for the material below.</p>
            <br>
            <input id="book_id" name="book_id" value="<?php echo htmlspecialchars($material['book_id']); ?>" style="display:none;">
            <label class="subheading">&nbsp;<b>ISBN:</b>&nbsp;&nbsp; <?php echo htmlspecialchars($material['ISBN']); ?></label>
            <br>
            <Br>
            <div class="staticFields">
            
                <div class="leftContainer">
                    <label><b>Book Title:</b>&nbsp;&nbsp; <?php echo htmlspecialchars($material['title']); ?></label>
                    <br>
                    <label><b>Book Type:</b>&nbsp;&nbsp; <?php echo htmlspecialchars($material['category']); ?></label>
                    <br>
                    <label><b>Genre:</b>&nbsp;&nbsp; <?php echo htmlspecialchars($genre); ?></label>
                    <br>
                    <label><b>Format:</b>&nbsp;&nbsp; <?php echo htmlspecialchars($material['format']); ?></label>
                </div>
                <div class="rightContainer">
                    <label><b>Author:</b>&nbsp;&nbsp; <?php echo htmlspecialchars($material['author']); ?></label>
                    <br>
                    <label><b>Publisher:</b>&nbsp;&nbsp; <?php echo htmlspecialchars($material['publisher']); ?></label>
                    <br>
                    <label><b>Place of Publication:</b>&nbsp;&nbsp; <?php echo htmlspecialchars($material['place_of_publication']); ?></label>
                    <br>
                    <label><b>Date of Publication:</b>&nbsp;&nbsp; <?php echo htmlspecialchars($material['date_of_publication']); ?></label>
                </div>
            </div>
            <br>
            <hr>
            <!--<label class="subheading">Editable Fields</label>-->
            <div class="inputFields">
                <div class="floating-label-wrap">
                    <input type="text" id="copyNo" name="copyNo" value="<?php echo htmlspecialchars($material['copies']); ?>" pattern="[0-9]{1,}" required>
                    <label for="copyNo" class="floating-label input-focus-label">Number of Copies</label>
                </div>
            </div>

            <!-- Button and return login group -->
            <button type="submit" id="saveChangeBtn" value="submit" onclick=""><b>Save Changes</b></button>
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