<?php include('session.php'); ?>
<html>
	<head>
		<title>Visualizations</title>
		<link rel="stylesheet" href="index.css">
		
		<!-- Load c3.css -->
		<link href="http://web.engr.oregonstate.edu/~hoffera/cs340/Final/c3-0.4.18/c3.css" rel="stylesheet">

		<link href="http://web.engr.oregonstate.edu/~hoffera/cs340/Final/c3-0.4.18/c3.min.css" rel="stylesheet">
		
		<!-- Load d3.js and c3.js -->
		<script src="http://web.engr.oregonstate.edu/~hoffera/cs340/Final/d3/d3.v3.min.js" charset="utf-8"></script>
		<script src="http://web.engr.oregonstate.edu/~hoffera/cs340/Final/c3-0.4.18/c3.min.js"></script>		
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
<h2>Visualize Differences between OSU Online CS Classes!</h2>
</div>

<div id="chart"></div>

<script>
var chart = c3.generate({
    bindto: '#chart',
    data: {
      columns: [
        ['data1', 30, 200, 100, 400, 150, 250],
        ['data2', 50, 20, 10, 40, 15, 25]
      ]
    }
});

function hello()
{
	var x = document.getElementById("frm1");
	console.log(x.elements[1]);
	console.log("Here");
}
</script>

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
	Class 1...................Class 2
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
	</div>";
?>

