<?php
session_start();
if (!isset($_SESSION['loggedin']))
{
	header('Location: index.html');
	exit();
}
	$servername="localhost";
	$username="root";
	$password="root";
	$dbname="phplogin";
	$con= mysqli_connect($servername,$username,$password,$dbname);
if(mysqli_connect_error())
{
	die('Failed to connect'.mysqli_connect_error());
}
	$stmt = $con->prepare('SELECT password, email FROM history WHERE id = ?');
	$stmt->bind_param('i', $_SESSION['id']);
	$stmt->execute();
	$stmt->bind_result($password, $email);
	$stmt->fetch();
	$stmt->close();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Profile</title>
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="style.css">
	</head>
			<h2><u>Profile </u></h2>
				<p><b>Your email address is:</b></p>
				<table>
                <tr>
						<td><u>Email </u>:</td>
						<td><?=$email?></td>
					</tr>
					
				</table>
        <body>
                <p>
				<a href="logout.php"><h3>Logout<h3></a>
				</p>
	</body>
</html>