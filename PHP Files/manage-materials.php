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
		<link rel="stylesheet" type="text/css" href="../CSS Files/AdminStyling.css"> <!--Styling for admin account-->
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
                var functions = document.getElementById('functions');
                var editFunctions = document.getElementById('editFunctions');

                if(functions.style.display == 'none'){
                    //Exit editing state
                    functions.style.display = 'block';
                    editFunctions.style.display = 'none';

                    var items = document.getElementsByClassName("checkContainer");
                    for(var item = 0; item < items.length; item++) {
                        items[item].classList.remove("editing");
                    }

                    showResult('');
                }
                else{
                    //Enter editing state
                    functions.style.display = 'none';
                    editFunctions.style.display = 'block';

                    var items = document.getElementsByClassName("checkContainer");
                    for(var item = 0; item < items.length; item++) {
                        items[item].classList.add("editing");
                    }
                }
            }
            document.ready(function (){
                var items = document.getElementsByClassName("checkContainer");
                for(var item = 0; item < items.length; item++) {
                    items[item].style.display = 'none';
                }
            });

        </script>
        <script>
            function refreshResult(){
                showResult("");
            }
        </script>
        <script>
            function deleteItems(){
                var items = document.getElementsByTagName("input");
                var checkItems = []
                var data = new FormData();
                for(var item = 0; item < items.length; item++){
                    if(items[item].getAttribute("type") === "checkbox"){
                        if(items[item].checked){
                            checkItems.push(items[item].value)
                        }
                    }
                }
                data.append('ids', JSON.stringify(checkItems));
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.open("POST", "delete-item.php", true);

                xmlhttp.onreadystatechange = function() {//Call a function when the state changes.
                    if(xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                        alert(xmlhttp.responseText);
                    }
                }
                xmlhttp.send(data);

                showResult(document.getElementById('search-bar').value);
            }
        </script>
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
		<a id="returnhome" href="../HTML Files/admin-account.html"><i class="fas fa-caret-left"></i>&nbsp; &nbsp; Return to Dashboard</a>
            <section class="contentContainer">
                <form class="search" action="manage-materials.php" method="GET">
				
                    <h1>Manage Materials</h1>
                    <div class="btnContainer">
                        <div id="editFunctions" style="display: none">
                            <button type="reset" id="cancelBtn" class="formBtn" onclick="changeButtons()"><b>Cancel</b></button>
                            <button type="reset" id="clearBtn" class="formBtn" onclick="refreshResult()"><b>Clear Selection</b></button>
                            <button type="button" id="deleteBtn" class="formBtn" onclick="deleteItems()"><b>Delete Selected</b></button>
                        </div>
                        <div id="functions" style="display: block">
                            <button type="button" id="editBtn" class="formBtn" onclick="changeButtons()"><b>Edit Materials</b></button>
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
                            <div class='row'>
                                <div class='checkContainer'>
                                   <input type='checkbox' id='checkbox<?php echo htmlspecialchars($material['book_id']); ?>'
                                           value='<?php echo htmlspecialchars($material['book_id']); ?>'>
                                    <label for='checkbox<?php echo htmlspecialchars($material['book_id']); ?>'></label>
                                </div>
                                <div class='card'>
                                    <div class='card-content'>
                                        <p><?php echo htmlspecialchars($material['title']); ?><br/>
                                            <small><?php echo htmlspecialchars($material['author']) .
                                                    ' | ' . htmlspecialchars($material['publisher']); ?></small><br/>
                                            <small><em><?php echo htmlspecialchars($material['ISBN']); ?></em></small><br/>
                                        </p>
                                    </div>
                                    <div class='card-action'>
                                        <a class='brand-text' href='update-material.php?id=<?php echo htmlspecialchars($material['book_id']); ?>'>Update</a>
                                    </div>
                                </div>
                            </div>
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
