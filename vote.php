<?php include('session.php');
?>

<?php
// change the value of $dbuser and $dbpass to your username and password
	include 'connectvarsEECS.php'; 
	
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}

	if (isset($_POST['submit'])) {
		$selectedClass = $_POST['onlineClass'];
		$selectedMetric = $_POST['metric'];
		$castVote = $_POST['castVote'];
		//$email
	
		$result;

		if ($selectedMetric == 'Difficulty')
		{		
			$sql = "INSERT INTO CourseStatsFinal VALUES ('$email', '$selectedClass', $castVote, NULL, NULL)";
			$result = mysqli_query($conn, $sql);
		}

		//else

		mysqli_free_result($result);
		mysqli_close($conn);
	}


?>

