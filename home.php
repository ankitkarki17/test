<?php
session_start();
if (!isset($_SESSION['loggedin']))
 {
	header('Location: index.html');
	exit();
}
?>
<!DOCTYPE html>
<html>
	<head>
		<style>
</style>
		<title>History</title>
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
				<h1><u>Record</u></h1>
				<a href="profile.php"><h3>Profile</h3></a>
				<a href="logout.php"><h3>Logout</h3></a>
			<h2><u>Database</u></h2>
			<p><b> Welcome, <?=$_SESSION['email']?>!</b></p>
	</body>
</html>