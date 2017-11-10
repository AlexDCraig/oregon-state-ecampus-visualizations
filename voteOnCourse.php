<?php include('session.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Vote</title>
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
</div>

<div align="center">
<div class="titleHeader">
<h2 align="center">Vote on an OSU Online CS Class!</h2>
</div>
</div>
</body>
</html>

<?php
// change the value of $dbuser and $dbpass to your username and password
	include 'connectvarsEECS.php'; 
	
	if (!$email)
	{
		echo "<h4 align='center'>You're not logged in. Please log in to vote.</h4>";
		exit();
	}

	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}

	$sql = "SELECT Title FROM CourseFinal";
	$result = mysqli_query($conn, $sql);

	echo "<div align='center'>";
	echo "<div style='margin:auto; width: 50%; float: center; align:center;'>
	<form action='vote.php' method='post'>
	
	Class 
	
	<select name='onlineClass'>";

	while($row = mysqli_fetch_assoc($result))
	{
		echo "<option value='" . $row["Title"];
		echo "'>" . $row["Title"];
		echo "</option>";
	}

	echo "</select> <br>
	
	Difficulty

	<select name='castVoteDif'>

	<option value='0'>0</option>
	<option value='1'>1</option>
	<option value='2'>2</option>
	<option value='3'>3</option>
	<option value='4'>4</option>
	<option value='5'>5</option>

	</select>

	<br>

	Quality of Online Lectures
	
	<select name='castVoteQual'>

	<option value='0'>0</option>
	<option value='1'>1</option>
	<option value='2'>2</option>
	<option value='3'>3</option>
	<option value='4'>4</option>
	<option value='5'>5</option>

	</select>

	<br>

	Dependence on Prior Knowledge

	<select name='castVoteDep'>

	<option value='0'>0</option>
	<option value='1'>1</option>
	<option value='2'>2</option>
	<option value='3'>3</option>
	<option value='4'>4</option>
	<option value='5'>5</option>

	</select>


	<br>
	 <br>
	<input type='submit' name='submit' value='Vote' /> 		
	<button id='myBtn' type='button' onclick='instructions();'>Help</button>
	</form>
	
	<!-- The Modal -->
<div id='myModal' class='modal'>

  <!-- Modal content -->
  <div class='modal-content'>
    <span class='close'>&times;</span>
    <p><b>Directions:</b> Choose an online CS course in the dropdown menu. Then, rate that course's difficulty (0 being VERY easy, 5 being VERY hard), the quality of online lectures provided for that course (0 being VERY poor, 5 being VERY excellent), and how much that course depends on the mastery of material from prior courses (0 being VERY unreliant on past material, 5 being VERY reliant.).</p>
  </div>

</div>
	</div></div>";
	
	echo "<script type='text/javascript'>
		function instructions()
		{
			console.log('here');
			// Get the modal
			var modal = document.getElementById('myModal');

			// Get the button that opens the modal
			var btn = document.getElementById('myBtn');

			// Get the <span> element that closes the modal
			var span = document.getElementsByClassName('close')[0];

			// When the user clicks on the button, open the modal 
			btn.onclick = function() {
				modal.style.display = 'block';
			}

			// When the user clicks on <span> (x), close the modal
			span.onclick = function() {
				modal.style.display = 'none';
			}

			// When the user clicks anywhere outside of the modal, close it
			window.onclick = function(event) {
				if (event.target == modal) {
					modal.style.display = 'none';
				}
			}
		}
					</script>
	"

?>
