<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db ="bookshelf";
$conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die ("Error connecting to database: ". $conn -> error);

$ids = $_POST['ids'];
foreach (explode(',', $ids) as $id){
    $sql = "DELETE FROM books WHERE book_id = '$id'";
    $result = mysqli_query($conn, $sql) or die($conn -> error);
    echo $result;
}




