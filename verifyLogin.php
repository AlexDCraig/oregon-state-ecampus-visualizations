<!DOCTYPE html>

<?php
// change the value of $dbuser and $dbpass to your username and password
	include 'connectvarsEECS.php'; 
	
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}

	// Sanitize inputs.
	$email = $_POST['email'];
	$email = mysqli_real_escape_string($conn, $email);
	$password = $_POST['password'];
	$password = mysqli_real_escape_string($conn, $password);

	if ($email == NULL)
		exit("No username provided");

	if ($password == NULL)
		exit("No password provided");

	$sql = "SELECT * FROM UserFinal WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);

	if($row = mysqli_fetch_assoc($result))
		echo "Successfully logged in.";
	
	else
		echo "Email/password combination not found.";
	
	mysqli_free_result($result);
	mysqli_close($conn);
?>
