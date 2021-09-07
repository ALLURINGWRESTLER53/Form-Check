<?php session_start(); ?>
<!DOCTYPE html>
<?php 
if(!isset($_SESSION['username']))
	header("Location:index.php");
?>


<?php include "links/link.php";?>
<?php include "links/db.php";?>

<html>
<head>

	<meta charset="utf-8">
	<title>Dashboard</title>
</head>
<body>
<div class="container">
	<div class="alert alert-info m-5" role="alert">
  Welcome ,User You have successfully logged in.Since you are seeing this message you are requested to login again.

</div>
<form  method="POST">
<button  name="btn1" disabled type="submit" class="btn btn-primary">Redirecting you to the login page.</button>
</form>
</div>
</body>
</html>
<?php
$username=$_SESSION['username'];
$password=$_SESSION['password'];
$email=$_SESSION['email'];
$query="INSERT INTO users(username,email,Password) VALUES('$username','$email','$password') ";
$result=mysqli_query($connection,$query);
if(!$result)
{
	echo mysqli_error($connection);
}
		session_destroy();

		header("Location:index.php");
?>