<?php include('session.php');
?>

<html>
	<head>
		<title>Profile History</title>
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
<h2>Profile History</h2>
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

	if ($email)
	{
		$query = "SELECT Course_Title, Difficulty, Quality, Dependence FROM CourseStatsFinal WHERE User_Email = '$email'";
		$result = mysqli_query($conn, $query);

		$courseTitles = array();
		$courseTitleCounter = 0;
		$difficulties = array();
		$difficultyCounter = 0;
		$qualities = array();
		$qualityCounter = 0;
		$dependences = array();
		$dependenceCounter = 0;

		while ($row = mysqli_fetch_assoc($result))
		{
			$courseTitles[$courseTitleCounter] = $row["Course_Title"];
			$courseTitleCounter = $courseTitleCounter + 1;

			

			$difficulties[$difficultyCounter] = $row["Difficulty"];
			$difficultyCounter = $difficultyCounter + 1;

			$qualities[$qualityCounter] = $row["Quality"];
			$qualityCounter = $qualityCounter + 1;
			
			$dependences[$dependenceCounter] = $row["Dependence"];
			$dependenceCounter = $dependenceCounter + 1;
		}

		echo "User Email: " . $email;
		echo "<br><br>";
		echo "<table><caption>Voting History</caption>";
		echo "<tr><th>Course Title</th><th>Difficulty</th><th>Quality of Online Lecture</th><th>Dependence on Prior Knowledge</th></tr>";
		
		for ($x = 0; $x < $courseTitleCounter; $x++)
		{
			echo "<tr>";
			echo "<td>";
			echo "" . $courseTitles[$x];
			echo "</td>";
			echo "<td>";
			echo "" . $difficulties[$x];
			echo "</td>";
			echo "<td>";
			echo "" . $qualities[$x];
			echo "</td>";
			echo "<td>";
			echo "" . $dependences[$x];
			echo "</td>";
			echo "</tr>";
		}

		echo "</table>";
		echo "</div>";
	}

	else
		echo "<h4 align='center'>You're not logged in. Click on account and then log in to do so.</h4>";

?>
