<?php session_start();?>
<?php  include "links/db.php";?>
<!DOCTYPE html>
<html>
<head>
	
	<?php include "links/link.php";?>
	<?php include "css/signupstyle.php";?>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
		<section class="container-fluid bg">
			<section class="row justify-content-center">
				<section class=" col-12 col-sm-6 col-md-3">
	<form  class="form-container" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
  <div class="form-group">
  	<label for="name">Enter your name</label>
    <input type="name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter name" name="name">
</div>
   <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="password1">Password</label>
    <input type="password" class="form-control" id="password1" placeholder="Password" name="password1">
  </div>
  <div class="form-group">
  	<label for="password2">Confirm Password</label>
    <input type="password" class="form-control" id="password2" placeholder="Password" name="password2">
  </div>
  <button type="submit"  name="submit"class="btn  btn-block btn-primary">Submit</button>
</form>
				</section>
			
		    </section>
		</section>
</body>

</html>
<?php
include "links/db.php";
if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$email=$_POST['email'];
	$password1=$_POST['password1'];
	$password2=$_POST['password2'];
	$email=mysqli_real_escape_string($connection,$email);
	$password1=mysqli_real_escape_string($connection,$password1);
	$password2=mysqli_real_escape_string($connection,$password2);
	
	if($password1!=$password2)
	{
		echo "Something is Wrong";
	}
	else
	{
		$_SESSION['username']=$name;
		$_SESSION['password']=$password1;
		$_SESSION['email']=$email;
		header("Location:check.php");
	}


}?>