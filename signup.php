<!DOCTYPE html>
<html>
	<head>
		<title>Sign up </title>
		<link rel="stylesheet" href="index.css">
	</head>
<body>
<h2>User Sign Up Page</h2>
<form method="post" action="insert.php">
	<input type="text" name="email" />Email</br/>
	<input type="password" name="password" />Password</br/>
	<input type="submit" value="Submit">
</form>	
</div>

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
