<?php?>

<!DOCTYPE html>
<html>
    <script src="https://kit.fontawesome.com/56b24aa4ed.js" crossorigin="anonymous"></script>
    <head>
        <title>Manage Materials</title> <!-- This is the title of the site that shows up in the tab feel free to change it -->
        <link rel="stylesheet" href="../CSS Files/WebsiteStyling.css"> <!-- Skeleton css file -->
        <link rel="stylesheet" href="../CSS Files/ManageMaterialsStyling.css"> <!-- Manage Materials css file -->
        <link href='https://fonts.googleapis.com/css?family=Armata' rel='stylesheet'> <!-- Google font file -->
        <link rel="icon" type="image/x-icon" href="../Misc Files/logo.ico"/> <!-- icon file -->

        <script>
            $(document).ready(function() {

                // Save all selects' id in an array
                // to determine which select's option and value would be changed
                // after you select an option in another select.
                var selectors = ['category', 'topic']

                $('#type').on('change', function() {
                    var index = selectors.indexOf(this.id)
                    var value = this.value

                    // check if is the last one or not
                    if (index < selectors.length - 1) {
                        var next = $('#' + selectors[index + 1])

                        // Show all the options in next select
                        $(next).find('option').show()
                        if (value != "") {
                            // if this select's value is not empty
                            // hide some of the options
                            $(next).find('option[data-value!=' + value + ']').hide()
                        }

                        // set next select's value to be the first option's value
                        // and trigger change()
                        $(next).val($(next).find("option:first").val()).change()
                    }
                })
            });
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
                <form class="search" action="../HTML%20Files/search_results.php" method="GET">
                    <br>
                    <label class="title"><b>Manage Materials</b></label>
                    <button type="reset" id="clearBtn" class="formBtn" onclick=""><b>Clear Selection</b></button>
                    <button type="button" id="deleteBtn" class="formBtn" onclick=""><b>Delete Selected</b></button>
                    <button type="button" id="addBtn" class="formBtn" onclick=""><b>Add Material</b></button>
                    <br>
                    <input type="text" id="search-bar" placeholder="Search" onkeyup="searchFunction()">
                    <a href="#"><i id="search-icon" class="fas fa-search"></i></a>
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
