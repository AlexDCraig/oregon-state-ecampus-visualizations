<!DOCTYPE html>
<html>
	<head>
		<title>Sign up </title>
		<link rel="stylesheet" href="index.css">
	</head>
<body>
<h2>User Sign Up Page</h2>
<h3>Alex Hoffer, 9/26/2017</h3>
<h4>Passwords require at least one number.</h4>

<form method="post" action="insert.php">
	<input type="text" name="username" />Username</br/>
	<input type="text" name="firstName" />First Name</br/>
	<input type="text" name="lastName" />Last Name</br/>
	<input type="text" name="email" />Email</br/>
	<input type="password" name="password" />Password</br/>
	<input type="number" name="age" />Age</br/>
	<input type="submit" value="Submit">
</form>	
</div>

<br>
<a href="http://web.engr.oregonstate.edu/~hoffera/cs340/HW1/listusers.php">Go to List Users page</a>

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
