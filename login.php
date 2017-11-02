<!DOCTYPE html>
<html>
	<head>
		<title>Log in </title>
		<link rel="stylesheet" href="index.css">
	</head>
<body>
<h2>User Log In Page</h2>

<form method="post" action="http://web.engr.oregonstate.edu/~hoffera/cs340/Final/verifyLogin.php">
	<input type="text" name="email" />email</br/>
	<input type="password" name="password" />password</br/>
	<input type="submit" value="Submit">
</form>	

<br>
<a href="http://web.engr.oregonstate.edu/~hoffera/cs340/Final/signup.php">Sign Up</a>
<br>

<?php
	include 'connectvarsEECS.php';
	
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

	if (!$conn) {
		die('Could not connect; ' . mysql_error());
	}

	mysqli_close($conn);

?>
</body>
</html>
