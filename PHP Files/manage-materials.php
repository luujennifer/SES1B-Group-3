<?php
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db ="bookshelf";
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die ("Error connecting to database: ". $conn -> error);

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
        <title>Manage Materials</title> <!-- This is the title of the site that shows up in the tab feel free to change it -->
        <link rel="stylesheet" href="../CSS Files/WebsiteStyling.css"> <!-- Skeleton css file -->
        <link rel="stylesheet" href="../CSS Files/ManageMaterialsStyling.css"> <!-- Manage Materials css file -->
        <link href='https://fonts.googleapis.com/css?family=Armata' rel='stylesheet'> <!-- Google font file -->
        <link rel="icon" type="image/x-icon" href="../Misc Files/logo.ico"/> <!-- icon file -->

        <!-- Live search script -->
        <script>
            function showResult(str) {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState===4 && this.status===200) {
                        document.getElementById("livesearch").innerHTML = this.responseText;
                    }
                }
                xmlhttp.open("GET","livesearch.php?q="+str,true);
                xmlhttp.send();
            }
        </script>
        <!-- Switch button script -->
        <script>
            function changeButtons(){
                var linkBtn = document.getElementById('linkBtn');
                var functionBtn = document.getElementById('functionBtn');
                if(linkBtn.style.display == 'none'){
                    linkBtn.style.display = 'block';
                    functionBtn.style.display = 'none';
                }
                else{
                    linkBtn.style.display = 'none';
                    functionBtn.style.display = 'block';
                }
            }
        </script>
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
                <form class="search" action="manage-materials.php" method="GET">
                    <label class="title"><b>Manage Materials</b></label>
                    <div class="btnContainer">
                        <div id="functionBtn" style="display: none">
                            <button type="button" id="cancelBtn" class="formBtn" onclick="changeButtons()"><b>Cancel</b></button>
                            <button type="reset" id="clearBtn" class="formBtn" onclick=""><b>Clear Selection</b></button>
                            <button type="button" id="deleteBtn" class="formBtn" onclick=""><b>Delete Selected</b></button>
                        </div>
                        <div id="linkBtn" style="display: block">
                            <button type="button" id="editBtn" class="formBtn" onclick="changeButtons()"><b>Edit Material</b></button>
                            <button type="button" id="addBtn" class="formBtn" onclick="window.location.href='../PHP Files/add-material.php'"><b>Add Material</b></button>
                        </div>
                    </div>

                    <br>
                    <!-- Search bar -->
                    <span class="inputIconWrap">
                        <input type="text" id="search-bar" placeholder="Search" onkeyup="showResult(this.value)">
                    </span>
                    <br>
                    <br>
                    <!-- Container for search results -->
                    <div id="livesearch" class="resultContainer">
                        <!-- Initialise container -->
                        <?php foreach($materials as $material){ ?>
                            <input type='checkbox' class='row'>
                                <option class='card' value='<?php echo htmlspecialchars($material['book_id']); ?>'>
                                    <div class='card-content'>
                                        <p><?php echo htmlspecialchars($material['title']); ?><br/>
                                            <small><?php echo htmlspecialchars($material['author']) .
                                                    ' | ' . htmlspecialchars($material['publisher']); ?></small><br/>
                                            <small><em><?php echo htmlspecialchars($material['ISBN']); ?></em></small><br/>
                                        </p>
                                    </div>
                                    <div class='card-action'>
                                        <a class='brand-text' href='#'>More Info</a>
                                    </div>
                                </option>
                            </input>
                            <hr>
                        <?php } ?>
                    </div>
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
