<!DOCTYPE html>
<html>
<head>
<title>Profile Page</title>
<?php
require_once("../Header - Footer/header.html");
?>
<!-- Bootstrap CSS -->

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

  <link rel="stylesheet" href="ProfilePageCss.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="mdb.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>
<body> <!-- Nav Bar -->
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#WelcomePage"><img src="/Icons/logo_white.png"  height="23.5"> </a>
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
  </nav>
<!-- Title and profile icon -->
<div id="My_Profile" class="text-center">
  <h1 style="font-size:60px;padding-top: 55px;">My Profile</h1>
  <img src="/Icons/Profile_Icon.png" alt="" style="width: 250px; height: auto;">
</div>
<!-- My notes Section -->
<div id="My_notes" class="Container-fluid"></div>
      <h3 style="font-size: 50px; padding-top: 30px; padding-left: 60px">My notes</h3>
        <div class="jumbotron Container-fluid">
          <img src="Icons/Notes_Icons/PurpleNoHover.png" class="hoverable">
          <div class="centered">COMP16212</div>
          <img src="Icons/Notes_Icons/PurpleNoHover.png" class="hoverable">
          <div class="">COMP1020</div>
        </div>


</body>
<footer>
<?php
require_once("../Header - Footer/footer.html");
?>
</footer>
</html>
