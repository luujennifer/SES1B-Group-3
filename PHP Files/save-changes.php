<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db ="bookshelf";
$conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die ("Error connecting to database: ". $conn -> error);

$id = $_POST['book_id'];
$copyNo = $_POST['copyNo'];


$sql = "UPDATE books SET copies = '$copyNo' WHERE book_id = '$id'";

if (!mysqli_query($conn, $sql)) {
    echo "<script>alert('Unable to update material, please try again.')</script>";
    echo "<script>location.replace('../PHP Files/update-material.php')</script>";
}
else {
    
    echo "<script>alert('Material successfully updated.')</script>";
    echo "<script>location.replace('../PHP Files/manage-materials.php')</script>";
}
?>
