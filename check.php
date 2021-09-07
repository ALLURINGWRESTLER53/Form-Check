<?php session_start(); ?> 
<!DOCTYPE html>
<html>

<head>
	<?php include "links/link.php";?>
	<?php include "css/signcheck.php"?>
	<meta charset="utf-8">
	<title>Check</title>
</head>

<body>
        <section class="container-fluid bg">
			<section class="row justify-content-center">
				<section class=" col-sm-6 col-md-3">
	<form   action="check.php" class="form-container" method="POST">
  <div class="form-group">
  	<label for="name">Enter The code you received</label>
    <input type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter name" name="code">
</div>
     <button type="submit"  name="submit1" class="btn  btn-block btn-primary">Submit</button>
</form>
</body>
</html>
<?php

if(isset($_SESSION['email']))
{
	$otp=rand(111111,999999);
$to="thapliyal.sumitth@gmail.com";
$subject="Test mail otp is $otp";
$from="sumitthapliyal125@gmail.com";
$body="";
$headers="From : $from";
 if(mail($to, $subject,$body,$headers))
 	{

$_SESSION['OTP']=$otp;
header("Location:verifyotp.php");
}
else
{
	?>
	<script >
	alert("Something went wrong");
	</script>

	<?php
	header("Location:index.php");
}
}
 




?>

