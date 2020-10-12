<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db ="bookshelf";
$conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die ("Error connecting to database: ". $conn -> error);

//get the q parameter from URL
$query=$_GET["q"];

//SQL query
if (strlen($query)>0) {
    $sql = "SELECT * FROM books WHERE (`title` LIKE '%".$query."%') OR (`author` LIKE '%".$query."%') ORDER BY title";
}
else{
    $sql = "SELECT * FROM books ORDER BY book_id";
}
$result = mysqli_query($conn, $sql) or die($conn -> error);
$materials = mysqli_fetch_all($result, MYSQLI_ASSOC);

//Formatting the output
$output = "";
foreach($materials as $material){
    $output = $output .
        "<div class='row'>
            <div class='checkContainer'>
               <input type='checkbox' id='checkbox" . htmlspecialchars($material['book_id']) . "'
                                           value='" . htmlspecialchars($material['book_id']) . "'>
                <label for='checkbox" . htmlspecialchars($material['book_id']) . "'></label>
            </div>
            <div class='card'>
                <div class='card-content'>
                    <p>" . htmlspecialchars($material['title']) . "<br/>
                        <small>" .  htmlspecialchars($material['author']) .
                                ' | ' . htmlspecialchars($material['publisher']) . "</small><br/>
                        <small><em>" .  htmlspecialchars($material['ISBN']) . "</em></small><br/>
                    </p>
                </div>
                <div class='card-action'>
                    <a class='brand-text' href='#'>More Info</a>
                </div>
            </div>
        </input>
        <hr>";
}

//Set a default response message if output is empty
if ($output=="") {
    $response="Sorry! We do not have what you're looking for.";
} else {
    $response=$output;
}

//Deliver the output
echo $response;
?>