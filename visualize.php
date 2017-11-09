<?php include('session.php');
?>

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
		
		$course1 = $_POST['onlineClass1'];
		$course2 = $_POST['onlineClass2'];

		$course1AvgDiffQ;
		$sql = "SELECT AVG(Difficulty) AS Average FROM CourseStatsFinal WHERE Course_Title = '$course1'";
		$course1AvgDiffQ = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($course1AvgDiffQ);
		$course1AvgDiffR = $row["Average"];
	
		$course1AvgQualQ;
		$sql = "SELECT AVG(Quality) AS Average FROM CourseStatsFinal WHERE Course_Title = '$course1'";
		$course1AvgQualQ = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($course1AvgQualQ);
		$course1AvgQualR = $row["Average"];
		
		$course1AvgDepQ;
		$sql = "SELECT AVG(Dependence) AS Average FROM CourseStatsFinal WHERE Course_Title = '$course1'";
		$course1AvgDepQ = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($course1AvgDepQ);
		$course1AvgDepR = $row["Average"];
	
		$course2AvgDiffQ;
		$sql = "SELECT AVG(Difficulty) AS Average FROM CourseStatsFinal WHERE Course_Title = '$course2'";
		$course2AvgDiffQ = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($course2AvgDiffQ);
		$course2AvgDiffR = $row["Average"];
		
		$course2AvgQualQ;
		$sql = "SELECT AVG(Quality) AS Average FROM CourseStatsFinal WHERE Course_Title = '$course2'";
		$course2AvgQualQ = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($course2AvgQualQ);
		$course2AvgQualR = $row["Average"];
		
		$course2AvgDepQ;
		$sql = "SELECT AVG(Dependence) AS Average FROM CourseStatsFinal WHERE Course_Title = '$course2'";
		$course2AvgDepQ = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($course2AvgDepQ);
		$course2AvgDepR = $row["Average"];

		// Table 1, Class 1
		echo "<br><table id='class1' style='width:40%'>
		<caption>$course1 Averages of Votes</caption>
		<tr>
			<th>Difficulty</th>
			<th>Quality of Online Lectures</th>
			<th>Dependence on Prior Knowledge</th>
		</tr>
		<tr>
			<td>$course1AvgDiffR</td>
			<td>$course1AvgQualR</td>
			<td>$course1AvgDepR</td>
		</tr>
		</table>
		";

		// Table 2, Class 2
		echo "<table id='class2' style='width:40%'>
		<caption>$course2 Averages of Votes</caption>
		<tr>
			<th>Difficulty</th>
			<th>Quality of Online Lectures</th>
			<th>Dependence on Prior Knowledge</th>
		</tr>
		<tr>
			<td>$course2AvgDiffR</td>
			<td>$course2AvgQualR</td>
			<td>$course2AvgDepR</td>
		</tr>
		</table>
		";




		mysqli_free_result($result);
		mysqli_close($conn);
	}
?>

<html>
<div id="chart"></div>
<script>
function parse(unparsedData)
{
	var parsedData = new Array();
	
	parsedData.push(unparsedData[0].innerHTML);
	parsedData.push(unparsedData[1].innerHTML);
	parsedData.push(unparsedData[2].innerHTML);
	parsedData.push(unparsedData[3].innerHTML);
	parsedData.push(unparsedData[4].innerHTML);
	parsedData.push(unparsedData[5].innerHTML);

	return parsedData;
}


var class1Table = document.getElementById('class1');
var class2Table = document.getElementById('class2');

var class1Title = class1Table.caption.innerHTML;
var cut1Index = class1Title.indexOf(' Averages of Votes');
class1Title = class1Title.substring(0, cut1Index);

var class2Title = class2Table.caption.innerHTML;
var cut2Index = class2Title.indexOf(' Averages of Votes');
class2Title = class2Title.substring(0, cut2Index);

var c1RowLength = class1Table.rows.length;
var c2RowLength = class2Table.rows.length;

var unparsedC1Data = new Array();

for (i = 0; i < c1RowLength; i++)
{
	var c1Cells = class1Table.rows.item(i).cells;
	var c1CellLength = c1Cells.length;

	for (var j = 0; j < c1CellLength; j++)
		unparsedC1Data.push(c1Cells.item(j));
}

var unparsedC2Data = new Array();

for (i = 0; i < c2RowLength; i++)
{
	var c2Cells = class2Table.rows.item(i).cells;
	var c2CellLength = c2Cells.length;

	for (var j = 0; j < c2CellLength; j++)
		unparsedC2Data.push(c2Cells.item(j));
}

var C1Data = parse(unparsedC1Data);
var C2Data = parse(unparsedC2Data);

function createColumns(col1, col2)
{
	var columnData = new Array();
	columnData[0] = new Array();
	columnData[1] = new Array();

	columnData[0].push(class1Title);
	columnData[0].push(col1[3]);
	columnData[0].push(col1[4]);
	columnData[0].push(col1[5]);
	
	columnData[1].push(class2Title);
	columnData[1].push(col2[3]);
	columnData[1].push(col2[4]);
	columnData[1].push(col2[5]);
	
	return columnData;
}

var columnData = createColumns(C1Data, C2Data);

console.log(columnData);

var chart = c3.generate({
    bindto: '#chart',
    data: {
      /*columns: [
        ['data1', 30, 200, 100, 400, 150, 250],
        ['data2', 50, 20, 10, 40, 15, 25]
      ],*/
	columns: columnData,

	type: 'bar'
    },

    axis: {
       x: {
	type: 'category',
	categories: ['Difficulty', 'Quality of Online Lectures', 'Dependence on Prior Knowledge']
	}
    },

    bar: {
	width: { 
		ratio: 0.5
	}
   }
});
</script>

</body>
</html>
