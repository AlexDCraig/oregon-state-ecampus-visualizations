<?php include('session.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Course Classifications</title>
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

<div class="dropdown">
<button class="dropbtn"><a href="rankings.php">Course Classifications</a>
</button>
</div>

</div>

<div style="width=100%">
<div class="titleHeader">
<h2 align="center">Course Classifications</h2>
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

	// Force the trigger that sets the classifications to be called.
	$sql = "UPDATE CourseStatsFinal SET Course_Title = Course_Title";
	$result = mysqli_query($conn, $sql);
	
	// Grab the courses that are above average in difficulty.
	$sql1 = "CREATE VIEW HardClasses AS SELECT DISTINCT Course_Title FROM CourseStatsFinal CSF WHERE CSF.Classification = 'Hard'";
	$sql = "SELECT Course_Title FROM HardClasses";	

	$result1 = mysqli_query($conn, $sql1);
	$result = mysqli_query($conn, $sql);
	
	$hardClasses = Array();
	$hardClassCounter = 0;
	
	while($row = mysqli_fetch_assoc($result))
	{
		$hardClasses[$hardClassCounter] = $row["Course_Title"];
		$hardClassCounter = $hardClassCounter + 1;
	}
	
	// Grab the courses that are below average in difficulty.
	$sql2 = "CREATE VIEW EasyClasses AS SELECT DISTINCT Course_Title FROM CourseStatsFinal CSF WHERE CSF.Classification = 'Easy'";
	$sql = "SELECT Course_Title from EasyClasses";

	$result1 = mysqli_query($conn, $sql2);
	$result = mysqli_query($conn, $sql);
	
	$easyClasses = Array();
	$easyClassCounter = 0;
	
	while($row = mysqli_fetch_assoc($result))
	{
		$easyClasses[$easyClassCounter] = $row["Course_Title"];
		$easyClassCounter = $easyClassCounter + 1;
	}
	
	echo "<h4>According to votes, the following classes are HARDER than average:</h2>";
	
	echo "<ul>";
	
	for ($x = 0; $x < $hardClassCounter; $x++)
	{
			echo "<li>" . $hardClasses[$x] . "</li>";
	}
	
	echo "</ul>";
	
	echo "<h4>According to votes, the following classes are EASIER than average or EQUAL to average:</h2>";
	
	echo "<ul>";
	
	for ($x = 0; $x < $easyClassCounter; $x++)
	{
			echo "<li>" . $easyClasses[$x] . "</li>";
	}
		
	echo "</ul>";

	$killView1 = "DROP VIEW HardClasses";
	$killView2 = "DROP VIEW EasyClasses";
	$killResult1 = mysqli_query($conn, $killView1);
	$killResult2 = mysqli_query($conn, $killView2);
	mysqli_close($conn);
?>
