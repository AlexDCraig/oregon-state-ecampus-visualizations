<?php include('session.php');
?>

<html>
	<head>
		<title>Home</title>
		<link rel="stylesheet" href="index.css">
	</head>
<body>

<div class="navHeader" align="center" width=100%>
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
</div>

</body>
</html>

<?php
// change the value of $dbuser and $dbpass to your username and password
	include 'connectvarsEECS.php'; 
	
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}

	if (isset($_POST['submit'])) {
		$selectedClass = $_POST['onlineClass'];
		$difVote = $_POST['castVoteDif'];
		$qualVote = $_POST['castVoteQual'];
		$depVote = $_POST['castVoteDep'];
		//$email
		
		$result;

		$sql = "INSERT INTO CourseStatsFinal (User_Email, Course_Title, Difficulty, Quality, Dependence) VALUES ('$email', '$selectedClass', '$difVote', '$qualVote', '$depVote')";
		$result = mysqli_query($conn, $sql);

		// This user has already voted on the course. So, update their previous vote.
		if (!$result)
		{
			$sql = "UPDATE CourseStatsFinal " . "SET Difficulty = '$difVote', Quality = '$qualVote', Dependence = '$depVote' " . "WHERE User_Email = '$email' AND Course_Title = '$selectedClass'";
			$result = mysqli_query($conn, $sql);
			echo "<h4 style='text-align:center;'>";
			echo $email . " has already voted on $selectedClass. Their previous vote has been updated to reflect what they just voted.";
			echo "</h4>";
		
		}

		else
		{
			echo "<h4 style='text-align:center;'>Congrats, $email! You just voted on $selectedClass.</h4>";
		}

		mysqli_free_result($result);
		mysqli_close($conn);
	}


?>

