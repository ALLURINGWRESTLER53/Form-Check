
<?php include "navig.php";
if(isset($_SESSION['ID']))
  {}
	else
	header("Location:index.php");

session_regenerate_id();?>

<?php include "links/link.php";?>
<?php include "css/style.php";?>
<?php include "links/db.php"; ?>
<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<title>
		DASHBOARD
	</title>
</head>
<body>
	<div class="container">
		<p class="text-center text-muted">WELCOME USER</p>
		<p> We will help you create forms where anyone can fill that form and submit it and you can download the information in Excel file</p>
		<p><a  type= "button" id="create" class="btn btn-primary"  href="createform.php">Please click here to create your form</a></p>

		<p><a type="button" id="download"  class ="btn btn-success" href="openfile.php">Download your already created form submisssions in a Excel file</a></p>
		<p><a type="button" id="delete"  class ="btn btn-danger" href="?link=1">DELETE YOUR TABLE TO CREATE A NEW TABLE</a></p>
		<button id="forminfo" class=" m-4 bg-info">Your form id is <?php echo $_SESSION['formid'];?>.  Please copy this form id and send it  to people from whom You need information.</button>
	</div>
	<?php
$flag=$_SESSION['flag'];
if($flag==1)
{
	?>
	
	<style>
	#create {
	 pointer-events: none;
  cursor: default;
  opacity: 0.6;
         }

	</style>
	<?php
}
else
{
	?>
	
	<style>
	#download {
	 pointer-events: none;
  cursor: default;
  opacity: 0.6;
         }
  #delete
  {
  	pointer-events: none;
  cursor: default;
  opacity: 0.6;

  }

	</style>
	<?php
}?>
	<?php
	$formid=$_SESSION['formid'];
if(isset($_GET['link'])){
    $link=$_GET['link'];
    if($link==1)
    {
    	$query="DROP TABLE `".$formid."`";
    	$result=mysqli_query($connection,$query);
    	echo mysqli_error($connection);
    	$query="UPDATE users SET flag=0 where formid=$formid";
    	$result=mysqli_query($connection,$query);
    	$_SESSION['flag']=0;
    	header("Location:dashboard2.php");
    }
    else
    {
    	header("Location:dashboard2.php");
    }
  }
	?>
<?php
$flag=$_SESSION['flag'];
if($flag==0)
{
	?>
	<script>document.getElementById('forminfo').style.display="none";</script>
	<?php
}
	else
	{
		?>
	
	<script>document.getElementById('forminfo').style.display="block";</script>
	<?php
}
?>

	
	

</body>
</html>