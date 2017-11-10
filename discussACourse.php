<?php include('session.php');
?>

<html>
	<head>
		<title>Discussion Board</title>
		<link rel="stylesheet" href="index.css">
	</head>
<body>

<div class="navHeader" align="center" width="100">
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

<div class="titleHeader">
<h2 align='center'>Select a course to discuss</h2>
</div>
</div>

</body>
</html>

<?php
	include 'connectvarsEECS.php'; 	

	// Post a list of possible courses to discuss. Let the user select a course and navigate to that course's discussion board.
	
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}

	$sql = "SELECT Title FROM CourseFinal";
	$result = mysqli_query($conn, $sql);
	echo "<div align='center'><div style='margin:auto; width: 50%; float: center; align:right'>
	<form action='discuss.php' method='post'>
	<select name='onlineClass'>";
	while($row = mysqli_fetch_assoc($result))
	{
		echo "<option value='" . $row["Title"];
		echo "'>" . $row["Title"];
		echo "</option>";
	}
	echo "</select> <br>
	
	<br>
	<input type='submit' name='submit' value='Go to board' />
	</form>
	</div></div>";
	
?>
