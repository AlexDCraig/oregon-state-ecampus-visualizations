<!DOCTYPE html>

<?php
// change the value of $dbuser and $dbpass to your username and password
	include 'connectvarsEECS.php'; 
	
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}

	// Sanitize inputs.
	$username = $_POST['username'];
	$username = mysqli_real_escape_string($conn, $username);
	$firstName = $_POST['firstName'];
	$firstName = mysqli_real_escape_string($conn, $firstName);
	$lastName = $_POST['lastName'];
	$lastName = mysqli_real_escape_string($conn, $firstName);
	$email = $_POST['email'];
	$email = mysqli_real_escape_string($conn, $email);
	$password = $_POST['password'];
	$password = mysqli_real_escape_string($conn, $password);
	$age = $_POST['age'];
	$age = intval($age);

	if ($username == NULL)
		exit("No username provided");

	if ($firstName == NULL)
		exit("No first name provided");

	if ($lastName == NULL)
		exit("No last name provided");

	if ($email == NULL)
		exit("No email provided");

	if ($password == NULL)
		exit("No password provided");

	function clean_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$username = clean_input($username);
	$firstName = clean_input($firstName);
	$lastName = clean_input($lastName);
	$email = clean_input($email);
	$password = clean_input($password);

	$checkForPWNum = 0;
	
	for ($i = 0; $i < strlen($password); $i++)
	{
		if (is_numeric($password[$i]) == true)
			$checkForPWNum = 1;
	}	

	if ($checkForPWNum == 1)
	{
		$query = "INSERT INTO Users (username, firstName, lastName, email, password, age) VALUES ('$username', '$firstName', '$lastName', '$email', MD5('$password'), '$age')";

		if (mysqli_query($conn, $query)) {
			echo "Record added.";
		}

		else {
			$error = mysqli_error($conn);
			
			if (strpos($error, 'Duplicate') !== false)
				echo "Username already taken";

			else
				echo "ERROR executing $query" . $error;
		}
	}

	else
	{
		echo "Password needs to contain a number.";
	}

	mysqli_close($conn);
?>

<html>
<br>
<br>
<a href="http://web.engr.oregonstate.edu/~hoffera/cs340/HW1/signup.php">Return to Sign up page.</a>
<br>
<br>
<a href="http://web.engr.oregonstate.edu/~hoffera/cs340/HW1/listusers.php">Go to List Users page.</a>
</html>
