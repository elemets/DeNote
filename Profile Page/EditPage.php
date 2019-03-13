<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sign in to DeNOTE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	  </head>
    <style>
          body {
              background-color: white;
          }
          .top-buffer {
              margin-top:100px;
          }
          .bottom-buffer {
              margin-bottom:20px;
          }
          .submit-btn {
              background-color: #660099;
          }
          .submit-font {
              color:#ffffff;
          }
          .submit-font:hover {
              color:#ecaa33;
          }
          .multi-form-wrapper{
	            margin-bottom: 20px;
          }
          .form-element{
              display: inline;
        	    width:100%;
          }
          .navbar {
              background-color: #660099;
          }
 	        .formcenter {
              min-height: 100%;  /* Fallback for browsers do NOT support vh unit */
   	          min-height: 100vh; /* These two lines are counted as one :-)       */
              width: auto;
  	          display: flex;
  	          align-items: center;
	        }
</style>
<title>Edit Profile</title>

  <body>
		<nav class="navbar">
	    <div class="container">
	      <a class="navbar-brand" href="../index.html"><img src="../Welcome Page/logo_white.png"  height="23.5"> </a>
	    </div>
	  </nav>
	  <?php
	  	require_once("database.php");
	  ?>

		<div class="container formcenter">
	    <div class="col-sm">
	      <div class="form-content">
	        <div class="form-top-left">
	          <h2>Edit Profile</h2>
	        </div>

		<div class="form-body">
	       <form class="form-horizontal" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">

		<div class="form-body form-check">
					 <input type="checkbox" class="form-control form-element form-check-input" name="box" id="box" value="withName">
	 				<label for="box" class="form-check-label"> I want to change username too</label>
    </div>

	  <div class="form-group">
        <label for="username"> New Username (mustn't contain <>)</label>
        <input type="textbox" class="form-control form-element" name="newUsername" id="text" placeholder="Username" pattern="[^<>]+" value="<?php echo $_SESSION['username'];?>" disabled>
    </div>

		<div class="form-group">
        <label for="password"> New Password (8+ characters, mustn't contain <>)</label>
        <input type="password" class="form-control form-element" name="newPassword" placeholder="Password" pattern="[a-zA-Z0-9!?@#$%*-/+_]{8,}">
				<label for="password"> Confirm your new password</label>
				<input type="password" class="form-control form-element" name="ConfirmNewPassword" placeholder="Confirm Password" pattern="[a-zA-Z0-9!?@#$%*-/+_]{8,}">
    </div>

		<div class="form-group">
				<label for="year"> Year of Study</label>
				<select class="form-control" name="newYear">
        	<option>Year 0</option>
        	<option>Year 1</option>
        	<option>Year 2</option>
        	<option>Year 3</option>
        	<option>Other</option>
      </select>
		</div>

		<div class="form-group">
		<input type="submit" class="btn btn-default btn-lg submit-btn btn-block submit-font bottom-buffer" value="Submit">
		</div>

  </form>
</div>
</div>
</div>
</div>

    <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST")
      {
				$oldUsername = $_SESSION['username'];
				$newUsername = $oldUsername;

				if (isset($_POST['box']))
				{
					$newUsername = $_POST["newUsername"];
				}

				$confirmPassword = $_POST["ConfirmNewPassword"];
        $newPassword = $_POST["newPassword"];
				if ($confirmPassword == $newPassword)
				{
					$valid = True;
				}
				else {
				 $valid = False;
				}
    	  $newYear = $_POST["newYear"];

    	  if(edit($newUsername, $newPassword, $newYear, $oldUsername) && !exist($newUsername) && $valid) {
          echo "I am working";
					$_SESSION["username"] = $newUsername;
         	header('Location: ../Profile Page/Profile.php');
    	  } else {
          echo "Wrong";
        }
      }
    ?>


	<script>
			document.getElementById('box').onchange = function() {
			document.getElementById('text').disabled = !document.getElementById('text').disabled;
			};
	</script>
  </body>
</html>
