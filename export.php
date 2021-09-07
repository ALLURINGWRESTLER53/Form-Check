<?php session_start();?>
<?php include "links/db.php"; ?>
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
$html="<table><tr>";
for($i=0;$i<$cout;$i++)
	{
	$html.="<th>".$field[$i]."</th>";
	}
	$html.="</tr>";
	$query="SELECT * from `".$formid."`";
	$result=mysqli_query($connection,$query);
	$tvalues=mysqli_num_rows($result);
	while($row=mysqli_fetch_assoc($result))
	{
		$html.="<tr>";
		for($i=0;$i<$cout;$i++)
		{
			$val=$field[$i];
			$html.="<td>$row[$val]</td>";
		}
		$html.="</tr>";
	}
	$html.="</table>";
	header("Content-Type:application/xls");
	header("Content-Disposition:attachment;filename=report.xls");
	echo($html);
	?>



