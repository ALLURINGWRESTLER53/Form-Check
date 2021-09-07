
<?php include"links/db.php"; ?>
<?php include "links/link.php";?>
<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<title>Submit</title>
</head>
<body>
<div id="wrap">
  <div class="row">
  	<form class="form" method="POST" action="">
  		<?php
  		function add($field,$val)
  		{
  			?>
		<div class="col-md-6 col-6 p-3 ml-3 ">
			<label for="<?php echo $val;?>"><?php echo $field[$val];?></label>
      <input type="text" class="form-control" placeholder="Enter Value" name="value[]" id="<?php echo $val;?>">
   		 </div>
   		<?php
   	}
   	?>

   		</div>
   	</div>
  
<?php
$data;
if(isset($_GET['formid']))
{
	$data=$_GET['formid'];

$query="SHOW COLUMNS from `".$data."`";
$result=mysqli_query($connection,$query);
if(mysqli_num_rows($result)==0)
	header("Location:notfound.php");
$col=0;
$field=[];
while($row =mysqli_fetch_assoc($result))
{
	$field[]=$row['Field'];
	$col++;
}
$novalues=0;
while($novalues!=count($field))
{
	add($field,$novalues);
	$novalues++;
}
}
else
{
	header("Location:index.php");
}
?>
<button type="submit" class="btn btn-primary m-4" name="submit">Submit</button>
 </form>
</body>
<?php
$values=array();
if(isset($_POST['submit']))
{
	$i=0;
	$value=$_POST['value'];
	foreach($value as $valuelist)
	{
		if($valuelist!='')
		$values[]=$valuelist;
	}
	for($i=0;$i<count($values);$i++)
		$values[$i]=mysqli_real_escape_string($connection,$values[$i]);
	$countfield=count($field);
	$countvalues=count($values);
	if(count($field)==count($values))
	{
		$query="INSERT INTO `".$data."` (";
      for($i=0;$i<count($field);$i++)
      {
        $query.="$field[$i]";
        if($i+1<count($field))
          $query.=",";
      }
      $query.=")";
      $query.=" VALUE(";
       for($i=0;$i<count($values);$i++)
      {
        $query.="'$values[$i]'" ;
        if($i+1<count($field))
          $query.=",";
      }
      $query.=")";
      $result=mysqli_query($connection,$query);
      if(!$result)
      	echo mysqli_error($connection);
      header("Location:dashboard2.php");
	}
else
	{header("Location:index.php");}
}
?>
<style type="text/css">
	body{
		background-color:#A0E6FF
;
	}
</style>
</html>