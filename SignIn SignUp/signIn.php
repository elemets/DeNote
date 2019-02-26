<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Theme Made By www.w3schools.com -->
    <title>DeNOTE</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../universalStyleSheet.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  </head>

<body>
      <nav class="navbarForm">
        <div class="container">
          <a class="navbar-brand" href="../index.html"><img src="../Welcome Page/logo_white.png"  height="23.5"> </a>
        </div>
      </nav>
<?php
	require_once("database.php");
      ?>

 <!-- Signin -->
             <div class="container formcenter">
            <div class="col-sm">
          <div class="form-content">
               <div class="form-top-left">
                <h2>Sign in</h2>
                </div>

            <div class="form-body">
              <form class="form-horizontal" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">

    		  <div class="form-group">
                <label for="username"> Username</label>
                <input type="textbox" class="form-control form-element" name="username" placeholder="Username">
              </div>

              <div class="form-group">
                <label for="password"> Password</label>
    		    <input type="password" class="form-control form-element" name="password" placeholder="Password">
              </div>

              <br>
	      <input type="submit" class="btn btn-default btn-lg submit-btn btn-block submit-font bottom-buffer" value="Sign In">
        <p style="text-align: center">Not a member? <a href="./signUp.php" style="color:#660098;">Sign up here</a></p>

              </form>
            </div>
       </div>
     </div>
   </div>
<?php

	if ($_SERVER["REQUEST_METHOD"] == "POST")
 {
	 $username = $_POST["username"];
	 $password = $_POST["password"];

	 if(validate_user($username, $password)) {
		 // Login Session
		 $_SESSION["username"] = $username;
		 header('Location: ../User Home Page/UserHomePage.php');
	 } else {
?>
		<div class="fixed-top" style="padding-top: 53px">
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error:</strong> Check that you entered the correct username and password.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
                </div>
<?php
	 }
	}
?>

</body>

</html>
