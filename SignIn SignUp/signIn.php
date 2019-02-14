<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
    <html>
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
      <link rel="stylesheet" href="/universalStyleSheet.css">
    
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
          .multi-form-wrapper{
	          margin-bottom: 20px;
          }
          .form-element{
              display: inline;
        	  width:100%;
          }
          .form-top-right{
	          width : 25%;
              font-size: 66px;
          }
          .form-top-left{
              width : 25%;
          }
          .navbar {
              background-color: #660099;
          }
 	.vertical-center {
  min-height: 100%;  /* Fallback for browsers do NOT support vh unit */
  min-height: 100vh; /* These two lines are counted as one :-)       */

  display: flex;
  align-items: center;
}
      </style>
    </head>

<body>

      <nav class="navbar">
        <div class="container">
        </div>
      </nav>
<?php
	require_once("database.php");
      ?>

 <!-- Signin -->

<div class="container vertical-center">
  <div class="row">
    <div class="col-bg">
    </div>
    <div class="col-bg">
      	<div class="container-fluid">
          <div id="main-signin" class="col-bg">			
          <div class="form-content">
    	    <div class="form-center">
    		  <h2>Login</h2>
    		</div>
    		
            <div class="form-body">
              <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    			
    		  <div class="form-group username">
                <label for="username"> Username</label>
                <input type="textbox" class="form-control form-element" name="username" placeholder="Username">
              </div>
    			
              <div class="form-group password">
                <label for="password"> Password</label>
    		    <input type="password" class="form-control form-element" name="password" placeholder="Password">
              </div>
    			
              <br>
	      <input type="submit" class="btn btn-default btn-lg submit-btn btn-block submit-font bottom-buffer" value="Submit">
              </form>
            </div>
          </div>
          </div>
	</div>
    </div>
    <div class="col-sm">
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
		 header('Location: ../User Home Page/UserHomePage.php');
	 } else {
		 // Incorrect Login
		echo 'not found';
	 }
	}
?>

</body>

</html>
