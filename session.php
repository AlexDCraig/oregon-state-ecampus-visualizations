<?php		
// change the value of $dbuser and $dbpass to your username and password
	include 'connectvarsEECS.php'; 
	
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}

	session_start();

	$email = $_SESSION['email'];
	$password = $_SESSION['password'];

	mysqli_close($conn);
?>
