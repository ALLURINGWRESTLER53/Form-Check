<?php session_start();?>
<nav class="navbar navbar-expand-lg navbar-light  nav_style p-3 ">
  <a class="navbar-brand pl-5" href="#">FORMS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto pr-5">
      <li class="nav-item ">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="dashboard2.php">Create or Submit A Form</a>

      </li>
      <li class="nav-item">
        <a class="nav-link" href="submit.php">Submit A Form</a>

      </li>
      <li class="nav-item">
        <a class="nav-link" id="signup" href="signup.php">SignUp</a>
        
      </li>
      <li class="nav-item">
        <a class="nav-link" href="aboutus.php">About</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="#">Contact us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link"  id="login" href="login.php">Login</a>
      </li>
       <li class="nav-item">
        <a class="nav-link"  id="logout" href="logout/logout.php">Logout</a>
      </li>

     
    </ul>
    
  </div>
</nav>
<?php
if(isset($_SESSION['ID']))
{
  ?>
  <script>
    document.getElementById("login").style.display="none";
    document.getElementById("signup").style.display="none";
     document.getElementById("logout").style.display="block";
  </script>
  <?php }
  else
  {?>
    <script >
    document.getElementById("login").style.display="block";
    document.getElementById("signup").style.display="block";
    document.getElementById("logout").style.display="none";


  </script>
 <?php }

?>
