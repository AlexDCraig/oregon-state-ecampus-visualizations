<!DOCTYPE html>
<html>
	<head>
		<title>Log in </title>
		<link rel="stylesheet" href="index.css">
	</head>
<body>

<div class="navHeader">
<div class="dropdown">
	<button class="dropbtn"><a href="http://web.engr.oregonstate.edu/~hoffera/cs340/Final/home.php">Home</a></button>
</div>

<!-- <a href="http://web.engr.oregonstate.edu/~hoffera/cs340/Final/account.php">Account</a> !-->
<div class="dropdown">
	<button class="dropbtn">Account</button>
	<div class="dropdown-content">
		<a href="http://web.engr.oregonstate.edu/~hoffera/cs340/Final/login.php">Login</a>
		<a href="http://web.engr.oregonstate.edu/~hoffera/cs340/Final/signup.php">Signup</a>
	</div>
</div>

<a href="http://web.engr.oregonstate.edu/~hoffera/cs340/Final/voteOnCourse.php">Vote on Course</a>
<a href="http://web.engr.oregonstate.edu/~hoffera/cs340/Final/discussACourse.php">Discuss a Course</a>
<a href="http://web.engr.oregonstate.edu/~hoffera/cs340/Final/visualizedCourseComparison.php">Visualized Course Comparison</a>
</div>

<div class="titleHeader">

<h2>User Log In Page</h2>

<form method="post" action="http://web.engr.oregonstate.edu/~hoffera/cs340/Final/verifyLogin.php">
	<input type="text" name="email" />email</br/>
	<input type="password" name="password" />password</br/>
	<input type="submit" value="Submit">
</form>	

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
