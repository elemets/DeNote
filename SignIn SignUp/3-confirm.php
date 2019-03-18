<?php
/* [VALIDATION CHECK] */
require "config.inc.php";
$pass = false;
// VALID $_GET VARS
if (is_numeric($_GET['id']) && isset($_GET['h'])) {
  require "databaseTest.php";
  $pdoUsers = new Users();
  $pass = $pdoUsers->verify($_GET['id'], $_GET['h']);
}

/* [THE HTML] */ ?>
<!DOCTYPE html>
<html>
<head>
  <title>REGISTRATION PAGE</title>
  <meta name="description" content="A description of this web page">
  <link rel="stylesheet" type="text/css" href="register.css">
</head>
<body>
  <!-- [HEADER] -->
  <header id="header">HEADER</header>

  <!-- [BODY] -->
  <div id="body">
    <?php if ($pass) { ?>
    <h3>THANK YOU!</h3>
    <p>Your account is now active.</p>
    <?php } else { ?>
    <h3>ERROR</h3>
    <p>We encountered some problems while activating your account.</p>
    <?php } ?>
  </div>

  <!-- [FOOTER] -->
  <footer id="footer">
    FOOTER<br>
    &copy; Copyright My Awesome Site
  </footer>
</body>
</html>
