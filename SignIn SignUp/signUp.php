<!DOCTYPE html>
    <html>
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
      <link rel="stylesheet" href="/universalStyleSheet.css">
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
      <link rel="stylesheet" href="/universalStyleSheet.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
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
 	  .formcenter {
 	      min-height: 100%;  /* Fallback for browsers do NOT support vh unit */
 	      min-height: 100vh; /* These two lines are counted as one :-)       */
 	      min-width: 100%;
              min-width: 100vh;
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

 <!-- Signup -->
	<div class="container formcenter">
	<div class="container-fluid">
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
    			  <input  type="password" class="form-control form-element" name="password" placeholder="Password">
                </div>
    			
                <br>
                <input type="submit" class="btn btn-default btn-lg submit-btn btn-block submit-font bottom-buffer" value="register">
    			</form>
            </div>
          </div>
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
?>
		<div class="fixed-top">
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error:</strong>please fill all fields correctly.
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
