<?php include('session.php');
?>

<html>
	<head>
		<title>Log in </title>
		<link rel="stylesheet" href="index.css">
	</head>
<body>

<div class="navHeader" width=100% align="center">
<div class="dropdown">
	<button class="dropbtn"><a href="http://web.engr.oregonstate.edu/~hoffera/cs340/Final/home.php">Home</a></button>
</div>

<!-- <a href="http://web.engr.oregonstate.edu/~hoffera/cs340/Final/account.php">Account</a> !-->
<div class="dropdown">
	<button class="dropbtn">Account</button>
	<div class="dropdown-content">
		<a href="http://web.engr.oregonstate.edu/~hoffera/cs340/Final/login.php">Login</a>
		<a href="http://web.engr.oregonstate.edu/~hoffera/cs340/Final/signup.php">Signup</a>
		<a href="http://web.engr.oregonstate.edu/~hoffera/cs340/Final/profilehistory.php">Profile History</a>
		<a href="http://web.engr.oregonstate.edu/~hoffera/cs340/Final/logout.php">Logout</a>
	</div>
</div>

<div class="dropdown">
	<button class="dropbtn"><a href="http://web.engr.oregonstate.edu/~hoffera/cs340/Final/voteOnCourse.php">Vote on Course</a></button>
</div>

<div class="dropdown">
	<button class="dropbtn"><a href="http://web.engr.oregonstate.edu/~hoffera/cs340/Final/discussACourse.php">Discuss a Course</a></button>
</div>

<div class="dropdown">
	<button class="dropbtn"><a href="http://web.engr.oregonstate.edu/~hoffera/cs340/Final/visualizedCourseComparison.php">Visualized Course Comparison</a></button>
</div>

<div class="dropdown">
<button class="dropbtn"><a href="rankings.php">Course Classifications</a>
</button>
</div>
</div>

<div class="titleHeader">

<div align="center">
<h2>User Log In Page</h2>

<form method="post" action="http://web.engr.oregonstate.edu/~hoffera/cs340/Final/verifyLogin.php">
	<input type="text" name="email" /> Email</br/></br/>
	<input type="password" name="password" /> Password</br/>
	<br><input type="submit" value="Log in">
</form>	
</div>
</body>
</html>


<?php
	include 'connectvarsEECS.php';
	
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

	if (!$conn) {
		die('Could not connect; ' . mysql_error());
	}

	if ($email)
	{
		echo "<h3 align='center'>You're already logged in.</h3>";
	}

	mysqli_close($conn);

?>
