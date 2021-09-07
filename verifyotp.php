<?php session_start(); ?> 
<?php if(isset($_SESSION['OTP']))
{}
else
    header("Location:index.php");
    ?>
<!DOCTYPE html><html>
<head>
    <?php include "links/link.php";?>
    <meta charset="utf-8">
    <title>Check</title>
</head>
<body>
        <section class="container-fluid bg">
            <section class="row justify-content-center">
                <section class=" col-sm-6 col-md-3">
    <form   action="" class="form-container" method="POST">
  <div class="form-group">
    <label for="name">Verify OTP</label>
    <input type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter name" name="code">
</div>
     <button type="submit"  name="submit1" class="btn  btn-block btn-primary">Submit</button>
</form>
</body>
</html>
 <?php if(isset($_POST['submit1']))
 {
    $confirmotp=$_POST['code'];
    $otp=$_SESSION['OTP'];
    if($confirmotp==$otp)
    {
     header("Location:dashboard.php");
    }
    unset($_SESSION['OTP']);
}
 ?>