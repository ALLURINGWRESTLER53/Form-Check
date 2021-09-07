<?php session_start();?>
<?php include "links/db.php"; ?>
<?php include "links/link.php";?>
<?php if(!isset($_SESSION['ID']))
  {
    header("Location:logout/logout.php");
    
  }
  if(isset($_SESSION['flag']))
  {
    $flag=$_SESSION['flag'];
    if($flag==1)
      header("Location:dashboard2.php");
  }
else
{
header("logout/logout.php");
}

?> 


 <?php
 if(isset($_POST['clickit']))
 {
  $name=$_POST['name'];
  $type=$_POST['type'];
  $count=0;
  $count1=0;
  foreach ($name as $namelist) {
  if( $namelist!='')
    $count++;
  }
  foreach ($type as $typelist) {
   if($typelist!='')
    $count1++;
  }
  if(!$count==$count1 ||$count1==0 ||$count==0)
  {
    ?>
    <script >alert('Incorrect');</script>
   
    <?php
    header("Location:index.php"); 
  }
  else{
     $formid;
    $id=$_SESSION['ID'];
    $formid=rand(1,10000);
    $query="SELECT * FROM users where formid=$formid";
    $result=mysqli_query($connection,$query);
    while(true)
    {
      if(mysqli_num_rows($result)>0)
      {
        $formid=rand(1,10000);
        $query="SELECT * FROM users where formid=$formid";
         $result=mysqli_query($connection,$query);
       }
       else
       {
        break;
       }
    }
    
    
      $query="UPDATE users SET formid=$formid WHERE id=$id";
      $result=mysqli_query($connection,$query);
      $query="UPDATE users SET flag=1 WHERE id=$id";
      $result=mysqli_query($connection,$query);
      $_SESSION['flag']=1;
      $mysql_tb=$formid;
      $query="CREATE TABLE `".$mysql_tb."`(";
      for($i=0;$i<count($name);$i++)
      {
        $query.="$name[$i] $type[$i]" ;
        if($i+1<count($name))
          $query.=",";
      }
      $query.=")";
      
    
      $result=mysqli_query($connection,$query);      
        echo mysqli_error($connection);
      $_SESSION['formid']=$formid;
      $count=0;
      for($i=0;$i<250;$i++)
        $count++;
      header("Location:dashboard2.php");
   

  }
}
 ?>

 <div class="container">
   <p class="mb-4  text-primary">Please fill your form  details  correctly and submit Till the meantime we will be setting up the setup for you.</p>
 </div>
  <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <div id="wrap">
  <div class="row" >

    
    <div class="col p-3 ml-3 field_box ">
      <input type="text" class="form-control" placeholder="Enter name" name="name[]">
    </div>
    <div class="col p-3 field_box1">
      <select class="form-control" name="type[]">
        
        <option  value="varchar(200)">Varchar(200)</option>
      </select>
    </div>
    
      <div class="col p-3 button_box">
        <input type="button" name="add_btn" value="Add more" onclick="add_more()">
      </div>
    </div>

 </div>
 <p>
 <input class="" disabled type="" id="box_count" value="1"></p>
 <input type="submit" name="clickit">
</form>


<script  >
  function add_more()
  {
    var box_count=jQuery("#box_count").val();
     box_count++;
    jQuery("#box_count").val(box_count);
    jQuery("#wrap").append('<div class="row" id="box_loop_'+box_count+'"><div class="col p-3 ml-3 field_box "><input type="text" class="form-control" placeholder="Enter name" name="name[]" id="box_id_'+box_count+'"></div><div class="col p-3 field_box1"><select class="form-control" name="type[]" id="box_type_'+box_count+'"><option value="varchar(50)">Varchar(50)</option></select></div><div class="col p-3 button_box"><input type="button" name="" value="Remove more" onclick=remove_more("'+box_count+'")></div>');
    
    
  }
  function remove_more(box_count)
  {
    jQuery("#box_loop_"+box_count).remove();
    box_count--;
    jQuery("#box_count").val(box_count);

  }
</script>

