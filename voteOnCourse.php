<?php include('session.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Vote</title>
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
<h2>Vote on an OSU Online CS Class!</h2>
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

	$sql = "SELECT Title FROM CourseFinal";
	$result = mysqli_query($conn, $sql);

	echo "<div style='margin:auto; width: 50%; float: center;'>
	<form action='vote.php' method='post'>
	<select name='onlineClass'>";

	while($row = mysqli_fetch_assoc($result))
	{
		echo "<option value='" . $row["Title"];
		echo "'>" . $row["Title"];
		echo "</option>";
	}

	echo "</select>
	
	<select name='metric'>
	
	<option value='Difficulty'>Difficulty</option>
	<option value='Quality of Online Lectures'>Quality of Online Lectures</option>
	<option value='Dependence on Prior Knowledge'>Dependence on Prior Knowledge</option>

	</select>

	<select name='castVote'>

	<option value='0'>0</option>
	<option value='1'>1</option>
	<option value='2'>2</option>
	<option value='3'>3</option>
	<option value='4'>4</option>
	<option value='5'>5</option>

	</select>

	<input type='submit' name='submit' value='Vote' />
	</form>
	</div>";

?>
