<?php include('session.php');
if (!$email)
{
	echo "Can't log out because you're not logged in.";
	session_destroy();
	exit();
}

if (session_destroy())
{
header("Location: home.php");
}
?>
