<?php
	// MANAGE REQUESTS SCRIPT
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$db = "bookshelf";
	
	$conn = new mysqli($dbhost, $dbuser, $dbpass, $db);

	$title = $_POST['title'];
	$author = $_POST['author'];
	$ISBN = $_POST['ISBN'];
	$type = $_POST['category'];
    $format = $_POST['format'];
    $copies = '1';
    
    
    if(isset($_POST['submit'])){
       $sql = "INSERT INTO books (author, title, ISBN, type, format, copies) 
            VALUES ('$author', '$title', '$ISBN','$type', '$format', '$copies')";
    } else if(isset($_POST['delete'])) { 
        $sql = "DELETE FROM book_request WHERE ISBN=$ISBN";
    }

			
	if (!mysqli_query($conn, $sql)) {
		echo "<script>alert('Material request was not updated, please try again.')</script>";
		echo "<script>location.replace('../HTML Files/admin-manage-request.html')</script>";
	}
	
	else {
		echo "<script>alert('Material request updated sucessfully.')</script>";
		echo "<script>location.replace('../HTML Files/admin-view-requests.php')</script>";
	}

?>