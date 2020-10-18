<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db ="bookshelf";
$conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die ("Error connecting to database: ". $conn -> error);

$id = $_POST['book_id'];
$copyNo = $_POST['copyNo'];
$renewNo = $_POST['renewNo'];
$fineAmount = $_POST['fineAmount'];

$sql = "UPDATE books SET copies = '$copyNo', available = '$renewNo' WHERE book_id = '$id'";
if(mysqli_query($conn, $sql)) {
    echo "<script>alert('Material updated successfully.')</script>";
    header('Location: manage-materials.php');
}
else {
    echo "<script>alert('Failed to update material, please try again.')</script>";
    header('Location: update-material.php?id=' . $id);
}
?>
