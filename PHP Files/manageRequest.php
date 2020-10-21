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
    $copies = '1'; /* default */
    
    
    if(isset($_POST['submit'])){ /* add to catalogue and remove from requests */
       $sql = "INSERT INTO books (author, title, ISBN, category, format, copies) 
            VALUES ('$author', '$title', '$ISBN','$type', '$format', '$copies')"; 
        $remove_request = "DELETE FROM book_request WHERE ISBN=$ISBN";
        mysqli_query($conn, $remove_request);
    } else if(isset($_POST['delete'])) {  /* remove from request */
        $sql = "DELETE FROM book_request WHERE ISBN=$ISBN";
    }

			
	if (!mysqli_query($conn, $sql)) { /* failed */
		echo "<script>alert('Material request was not updated, please try again.')</script>";
		echo "<script>location.replace('../HTML Files/admin-manage-request.html')</script>";
	}
	
	else { /* pass */
		echo "<script>alert('Material request updated sucessfully.')</script>";
		echo "<script>location.replace('../HTML Files/admin-view-requests.php')</script>";
	}

?>