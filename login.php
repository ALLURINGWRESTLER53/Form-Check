<?php session_start();
session_regenerate_id();?>
<?php include "links/db.php"; ?>
<?php include "links/link.php";?>
<?php include "css/loginstyle.php";?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>LOGIN</title>
</head>
<body>
	<section class="row justify-content-center">
	<div class="col-6 col-md-3 mt-5 box">
	<form class="form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
		<div class="form-group">
			<label for="uname">Username</label>
			<input type="text" name="uname" id="uname" class="form-control">
		</div>
		<div class="form-group">
			<label for="pass">Password</label>
			<input type="text" name="pass" id="pass" class="form-control">

		</div>
		<div class="form-group">
			<input type="submit"  class="btn btn-info btn-block" name="submit" value ="Click to login">
		</div></form></div></section>
</body>
<?php
if(isset($_POST['submit']))
{
$username=$_POST['uname'];
$password=$_POST['pass'];
$username=mysqli_real_escape_string($connection,$username);
$password=mysqli_real_escape_string($connection,$password);	
if(empty($username)||empty($password))
{?>
	<script>alert("Either of the things is empty Please check again");</script>
	<?php
}
$query="SELECT * FROM users where username='$username' AND Password='$password'";
$result=mysqli_query($connection,$query);
if(!mysqli_num_rows($result)>0)
{
	?>
	<script > alert("Some of your details may be incorrect Please try again");</script>
	<?php
}
else
{
	while($row=mysqli_fetch_assoc($result))
	{
		$id=$row['id'];
		$flag=$row['flag'];
		$formid=$row['formid'];
	}
	$_SESSION['USERNAME']=$username;
	$_SESSION['ID']=$id;
	$_SESSION['flag']=$flag;
	$_SESSION['formid']=$formid;
	header("Location:dashboard2.php");
}
}
?>
</html>