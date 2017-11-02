<!DOCTYPE html>
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
</script>

</body>
</html>
