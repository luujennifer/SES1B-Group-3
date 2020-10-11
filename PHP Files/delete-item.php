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
    if(mysqli_query($conn, $sql)){
        echo "Material successfully deleted";
    }
    else{
        echo ($conn -> error);
    }
}




