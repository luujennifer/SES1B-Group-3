<?php
	// SIGN UP SCRIPT
	
	session_start();

	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$db = "bookshelf";
	
	$conn = new mysqli($dbhost, $dbuser, $dbpass, $db);

	$title = $_POST['bookTitle'];
	$author = $_POST['author'];
	$publisher = $_POST['publisher'];
	$pubPlace = $_POST['pubPlace'];
	$pubDate = $_POST['pubDate'];
	$ISBN = $_POST['isbn'];
	$type = $_POST['type'];
	$nonfictiongenre = $_POST['non-fiction-genre'];
	$fictiongenre = $_POST['fiction-genre'];
	$format = $_POST['format'];
	$copies = $_POST['copyNo'];

	$sql = "INSERT INTO books (author, title, publisher, place_of_publication, date_of_publication, ISBN, category, non_fiction_topic, fiction_topic, format, copies) 
			VALUES ('$author','$title', '$publisher', '$pubPlace', '$pubDate', '$ISBN', '$type', '$nonfictiongenre', '$fictiongenre', '$format', '$copies')";
			
	if (!mysqli_query($conn, $sql)) {
		echo "<script>alert('Add new material failed, please try again.')</script>";
		echo "<script>location.replace('../PHP Files/add-material.php')</script>";
	}
	
	else {
		echo "<script>alert('New material has been successfully added.')</script>";
		echo "<script>location.replace('../PHP Files/manage-materials.php')</script>";
	}

?>