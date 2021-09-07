<?php include"links/db.php"; ?>
<?php include "links/link.php";?>

<!DOCTYPE html>

<html>
<head>

	<meta charset="utf-8">
	<title>Submit</title>
</head>
<body>
 <div class="container">
		<div class="col-lg-5 mt-5 login d-flex justify-content-around">
				<form class="form" method="POST">
		<label for="formno" >Enter the form id</label>
<input type="text" class="text-control" name="formno" id="formno">

<button type="submit" name="submit" class="btn btn-primary ">Join</button>
</div>
</form>

	</div>
 </div>
</body>
<style type="text/css">

	.login{
		background-color: rgba(243, 221, 4, 0.2); 
color: rgba(243, 221, 4, 0.2);
	
	padding: 30px;	
	border-radius: 10px;
	box-shadow:0px 0px 10px 0px #000 ;
	}
	label{
		color: blue;
	}

</style>
</html>
<?php
if(isset($_POST['submit']))
{
	$val=$_POST['formno'];
	$val=mysqli_real_escape_string($connection,$val);
	if(empty($val))
	header("Location:index.php");
	else
	{
		$query="SELECT formid from users where formid=$val";
		$result=mysqli_query($connection,$query);
		if(mysqli_num_rows($result)==0)
			header("Location:notfound.php");
		 while($data= mysqli_fetch_assoc($result))
		 {
		 	$iid=$data['formid'];
		 	header("Location:submitform.php?formid=$iid");
		 }

}
}
?>