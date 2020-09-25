<?php

session_start();

$email = $POST['email'];
$password = $POST['password'];

$email = mysql_real_escape_string($email);
$passowrd = mysql_real_escape_string($password);

$db = mysqli_connect('localhost', 'root', '', 'bookshelf');

if ( isset($_POST['Log_sub'])) {
	
  $e = mysqli_real_escape_string($db, $_POST['email']);
  $p = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($e)) {
  	array_push($errors, "Username is required");
  }
  if (empty($p)) {
  	array_push($errors, "Password is required");
  }

if ($row['email'] == $email) && row['password']  == $password {
	echo "Welcome ".$row['email'];
	header('location: index.php');
	
}	else {
	echo "failed to login"
	
	header('location: index.php');
}
	

	

?>
