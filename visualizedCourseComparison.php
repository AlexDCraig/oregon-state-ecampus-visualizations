<?php include('session.php'); ?>
<html>
	<head>
		<title>Visualizations</title>
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
<h2 align="center">Visualize Differences between OSU Online CS Classes!</h2>
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
	echo "<div align='center'><div style='margin:auto; width: 50%; float: center;'>
	<div>
	<h4>Class 1/Class 2</h4> 
	</div>
	<div align='center'>
	<form action='visualize.php' method='post'>
	<select name='onlineClass1'>";
	while($row = mysqli_fetch_assoc($result))
	{
		echo "<option value='" . $row["Title"];
		echo "'>" . $row["Title"];
		echo "</option>";
	}
	echo "</select>"; 

	$sql = "SELECT Title FROM CourseFinal";
	$result = mysqli_query($conn, $sql);
	
	echo "
	<select name='onlineClass2'>";
	while($row = mysqli_fetch_assoc($result))
	{
		echo "<option value='" . $row["Title"];
		echo "'>" . $row["Title"];
		echo "</option>";
	}
	echo "</select><br><br>
	<input type='submit' name='submit' value='Visualize!' />
	</form>
	</div>
	</div></div>";
?>

