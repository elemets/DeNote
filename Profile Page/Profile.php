<!DOCTYPE html>
<html>
<head>
<title>Profile Page</title>
<?php
require_once("../Header - Footer/header.php");
?>
<!-- Bootstrap CSS -->


</head>
<body> <!-- Nav Bar -->



<!--  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#WelcomePage"><img src="Icons/logo_white.png"  height="23.5"> </a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-center">
          <li><a href="#My_notes">MY NOTES</a></li>
          <li><a href="#Following">FOLLOWING</a></li>
          <li><a href="#Followers">MY FOLLOWERS</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="SignIn SignUp/signUp.php"><span class="glyphicon glyphicon-user"></span>SIGN UP</a></li>
          <li><a href="SignIn SignUp/signIn.php"><span class="glyphicon glyphicon-log-in"></span>LOGIN</a></li>
        </ul>
      </div>
    </div>
  </nav> -->
<!-- Title and profile icon -->
<div id="My_Profile" class="text-center">
  <h1 style="font-size:60px;padding-top: 55px;">My Profile</h1>
  <?php
  session_start();
  require_once('config.inc.php');
  $conn = new PDO("mysql:host=$database_host;dbname=$database_name", $database_user, $database_pass);
  $conn2 = new mysqli($database_host, $database_user, $database_pass, "2018_comp10120_z3");
  echo $_SESSION['username'];
  $userID = $conn2->query("SELECT UserID FROM Users WHERE Username ='$_SESSION[username]'")->fetch_object()->UserID;//userID query
  $stat = $conn->prepare("SELECT * FROM Notes WHERE UserID = ?");
  $stat->bindParam(1, $userID);
  $stat->execute();

  while($row = $stat->fetch()){
    echo "<li><a target='_blank' href='view.php?id=".$row['NoteID']."'>".$row['FileName']."</a></li>";
  }
   ?>
  <img src="Icons/Profile_Icon.png" alt="" style="width: 250px; height: auto;">
</div>
<!-- My notes Section -->
<div id="My_notes" class="grid-container"></div>
      <h3 style="font-size: 50px; padding-top: 30px; padding-left: 60px">My notes</h3>
        <div class="jumbotron Container-fluid">
          <img src="Icons/Notes_Icons/PurpleNoHover.png" class="hoverable">
          <div class="centered">COMP16212</div>
        </div>

  <div class="">
    <h3 style="font-size: 50px; padding-top: 30px; padding-left: 60px">Following</h3>
    <div class="jumbotron Container-fluid">
      <?php
      Bobi

      ?>

    </div>
  </div>
  <div class="">
    <h3 style="font-size: 50px; padding-top: 30px; padding-left: 60px">My Followers</h3>

  </div>


</body>
<footer>
<?php
require_once("../Header - Footer/footer.html");
?>
</footer>
</html>
