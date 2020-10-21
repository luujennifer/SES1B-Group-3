<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db ="bookshelf";
$conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die ("Error connecting to database: ". $conn -> error);

$ids = $_POST['ids'];
foreach(explode(',', $ids) as $id){
    $id = preg_replace('/[^A-Za-z0-9\-]/', '', $id);;
    $sql = "DELETE FROM books WHERE book_id = '$id'";
    if(!mysqli_query($conn, $sql)){
        echo "<script>alert('Material could not be deleted, please try again.')</script>";
		echo "<script>location.replace('../PHP Files/manage-materials.php')</script>";
    }
    else{
        
		echo "<script>alert('Material sucessfully deleted.')</script>";
		echo "<script>location.replace('../PHP Files/manage-materials.php')</script>";
    }
}




