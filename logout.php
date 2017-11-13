<?php include('session.php');
if (!$email)
{
	echo "
	<html>
	<head>
		<title>Home</title>
		<link rel='stylesheet' href='index.css'>
	</head>
<body>

<div class='navHeader' align='center' width='100%'> 
<div class='dropdown'>
	<button class='dropbtn'><a href='http://web.engr.oregonstate.edu/~hoffera/cs340/Final/home.php'>Home</a></button>
</div>
<div class='dropdown'>
	<button class='dropbtn'>Account</button>
	<div class='dropdown-content'>
		<a href='http://web.engr.oregonstate.edu/~hoffera/cs340/Final/login.php'>Login</a>
		<a href='http://web.engr.oregonstate.edu/~hoffera/cs340/Final/signup.php'>Signup</a>
		<a href='http://web.engr.oregonstate.edu/~hoffera/cs340/Final/profilehistory.php'>Profile History</a>
		<a href='http://web.engr.oregonstate.edu/~hoffera/cs340/Final/logout.php'>Logout</a>
	</div>
</div>

<div class='dropdown'>
	<button class='dropbtn'><a href='http://web.engr.oregonstate.edu/~hoffera/cs340/Final/voteOnCourse.php'>Vote on Course</a></button>
</div>

<div class='dropdown'>
	<button class='dropbtn'><a href='http://web.engr.oregonstate.edu/~hoffera/cs340/Final/discussACourse.php'>Discuss a Course</a></button>
</div>

<div class='dropdown'>
	<button class='dropbtn'><a href='http://web.engr.oregonstate.edu/~hoffera/cs340/Final/visualizedCourseComparison.php'>Visualized Course Comparison</a></button>
</div>

<div class='dropdown'>
<button class='dropbtn'><a href='rankings.php'>Course Classifications</a>
</button>
</div>
</div>

	<h3 align='center'>Can't log out because you're not logged in.</h3></body></html>";
	session_destroy();
	exit();
}

if (session_destroy())
{
header("Location: home.php");
}
?>
