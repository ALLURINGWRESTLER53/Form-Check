<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<?php include "links/db.php"; ?>
<?php include "links/link.php";?>
	<meta charset="utf-8">
	<title>Download</title>
</head>

<body>
	<table class="mt-4 table table-hover ">
  <thead>
    <tr>
    	<?php
$id=$_SESSION['ID'];
$query="SELECT formid from users Where id=$id";
$result=mysqli_query($connection,$query);
$row=mysqli_fetch_assoc($result);
$formid=$row['formid'];
$query="SHOW COLUMNS from `".$formid."`";
$result=mysqli_query($connection,$query);
$col=0;
$field=array();
while($row =mysqli_fetch_array($result))
{
	$field[]=$row['Field'];
	$col++;
}

$cout=count($field);
    	for($i=0;$i<$cout;$i++)
    	{
    		?>
    	
    	<th ><?php echo$field[$i]; ?></th>	
    <?php }?>
   
    </tr>
  </thead>
  <tbody>
   <?php
   $query="SELECT * FROM `".$formid."`";
   $result=mysqli_query($connection,$query);
   while($row=mysqli_fetch_assoc($result))
   {
   ?> <tr><?php
   	for($i=0;$i<$cout;$i++)
   	{
   		$val=$field[$i];
   		echo "<td>$row[$val]</td>";
   	}
   ?>
   </tr>
   <?php
}
   ?>
    
  </tbody>
</table>
<a  href="export.php" class="btn btn-primary" name="submit">Click Me to download all this in a excel file.</a>
</body>
</html>
<?php
?>