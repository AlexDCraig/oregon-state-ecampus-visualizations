<?php include('session.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Home</title>
		<link rel="stylesheet" href="index.css">
	</head>
<body>

<div class="navHeader" align="center" width="100%">
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

</div>

</body>
</html>

<?php
	include 'connectvarsEECS.php'; 	
	
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}	

	$timestamp = $_COOKIE["time"];

	$sql = "SELECT User_Email FROM CommentFinal WHERE Timestamp = '$timestamp'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	$emailOfPoster = $row["User_Email"];

	// The person logged in posted the comment.
	if ($emailOfPoster == $email)
	{
		$sql = "DELETE FROM CommentFinal WHERE Timestamp = '$timestamp'";
		$result = mysqli_query($conn, $sql);	
		echo "<h3 align='center'>Your comment has been deleted.</h3>";	
	}

	else
	{
		echo "<h3 align='center'>That comment belongs to $emailOfPoster. If you wish to delete it, either ask him or log on to his account.</h3>";
	}

?>
