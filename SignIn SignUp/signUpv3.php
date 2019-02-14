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
              margin-top:20px; 
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
              width : 75%;
          }
          .navbar {
              background-color: #660099;
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

 <!-- Signup -->
          <div id="main-signup" class="col-sm">
          <div class="form-content">
    	    <div class="form-top-left">
    		  <h2>Signup</h2>
    		</div>
    
            <div class="form-body">
    			<form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    			
    			<div class="form-group username">
                  <label for="username"> Username</label>
            	  <input type="textbox" class="form-control form-element" name="username" placeholder="Username">
                </div>
    			
                <div class="form-group email">
                  <label for="email"> University Email</label>
            	  <input type="textbox" class="form-control form-element" name="email" placeholder="University Email">
                </div>
    
                <div class="form-group password">
                  <label for="password"> Password</label>
    			  <input  type="password" class="form-control form-element" name="password" placeholder="Password" data-validation="false">
                </div>
    			
                 <div class="form-group confirm-password">
                  <label for="confirm-password"> Confirm Password</label>
    			  <input  type="password" class="form-control form-element" name="password1" placeholder="Confirm Password" data-validation="false">
                </div>
    			
                <br>
                <input type="submit" class="btn btn-default btn-lg submit-btn btn-block submit-font bottom-buffer" value="register">
    			</form>
            </div>
          </div>
    	  </div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
 {
	 $username = $_POST["username"];
	 $password = $_POST["password"];
	 $email = $_POST["email"];

	 if(register($username, $password, $email)) {

 header('Location: ../User Home Page/UserHomePage.php');
	 } else {
		 // Incorrect Login
echo "incorrect regestration";
	 }
	}
?>
</body>

</html>
