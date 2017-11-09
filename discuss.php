<?php include('session.php');
?>

<html>
	<head>
		<title>Discussion Board</title>
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

		echo "
			<script type= 'text/javascript'>
			function createCookie(name, value, days)
			{
				 var expires = '';
    				if (days) {
        				var date = new Date();
        				date.setTime(date.getTime() + (days*24*60*60*1000));
        				expires = '; expires=' + date.toUTCString();
    				}
    				document.cookie = name + '=' + value + expires + '; path=/';	
			}

			function deleter(m)
			{
				console.log(m);
				createCookie('time', m, 7);
				window.location = 'delete.php';
			}
			</script>
		";

		$selectedClass = $_POST['onlineClass'];
	
		$sql = "SELECT DB_ID FROM DiscussionBoardFinal WHERE Course_title = '$selectedClass'";
		$result = mysqli_query($conn, $sql);
	
		$row = mysqli_fetch_assoc($result);
		$discBoardID = $row["DB_ID"];

		$_SESSION['dbid'] = $discBoardID;
		$_SESSION['coursetitle'] = $selectedClass;

		echo "<h3>Discussion Board for $selectedClass</h3>";

		$sql = "SELECT Timestamp, User_Email, Message_Content FROM CommentFinal C, DiscussionBoardFinal D WHERE C.Associated_DB_ID = D.DB_ID AND D.DB_ID IN (SELECT D1.DB_ID FROM DiscussionBoardFinal D1 WHERE Course_title = '$selectedClass')";
		$result = mysqli_query($conn, $sql);

		echo "<table>";

		echo "<tr><th>Timestamp</th><th>User Email</th><th>Message</th></tr>";

		while ($row = mysqli_fetch_assoc($result))
		{
			echo "<tr>";
			echo "<td>" . $row["Timestamp"] . "</td>";
			echo "<td>" . $row["User_Email"] . "</td>";
			echo "<td>" . $row["Message_Content"] . "</td>";	
			echo "<td><button id='" . $row["Timestamp"] . "' onClick='deleter(this.id)'>Delete Comment</button></td>";
			echo "</tr>";
		}

		echo "</table>";

		echo "<h4>Post Message</h4>";
	
		echo "<form action='post.php' method='post'>";
		echo "<textarea rows='4' cols='50' placeholder='Enter a comment here.' name='comment'></textarea>";
		echo "<br><input type='submit'></form>";		

		mysqli_free_result($result);
		mysqli_close($conn);
	}
?>
