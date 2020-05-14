<!DOCTYPE html>
<html>
	<head>
		<title>Verify</title>
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="style.css">
    </head>
    <body>
    <?php
        session_start();
        $servername="localhost";
        $username="root";
        $password="root";
        $dbname="phplogin";
   $con = mysqli_connect($servername, $username, $password, $dbname);
if (mysqli_connect_error())
 {
	die ('Failed to connect ' . mysqli_connect_error());
}
    if ( !isset($_POST['email'], $_POST['password']) ) 
    {
        die ('Please fill both email and password field!');
    }
    if ($stmt = $con->prepare('SELECT id, password FROM history WHERE email = ?')) 
    {
        $stmt->bind_param('s', $_POST['email']);
        $stmt->execute();
        $stmt->store_result();
    }
    if ($stmt->num_rows > 0)
    {
        $stmt->bind_result($id, $password);
        $stmt->fetch();
    if ($_POST['password'] === $password) 
    {
        session_regenerate_id();
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['id'] = $id;
            header('Location: home.php');
        } 
    else 
    {
        echo '<h2>Incorrect Password!</h2>';
    }
    }
    else 
    {
        echo '<h2>Invalid!<h2>';
    }
        $stmt->close();
?>
</body>
</html>