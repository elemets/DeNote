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
 <!-- Signin -->
          <div id="main-signin" class="col-sm">			
          <div class="form-content">
    	    <div class="form-top-left">
    		  <h2>Signin</h2>
    		</div>
    		
            <div class="form-body">
              <form role="form">
    			
    		  <div class="form-group username">
                <label for="username"> Username</label>
                <input type="textbox" class="form-control form-element" name="username" placeholder="Username">
              </div>
    			
              <div class="form-group password">
                <label for="password"> Password</label>
    		    <input type="password" class="form-control form-element" name="password" placeholder="Password">
              </div>
    			
              <br>
    	      <button type="button" class="btn btn-default btn-lg submit-btn btn-block submit-font bottom-buffer"> Signin</button>
              </form>
            </div>
          </div>
          </div>

</body>

</html>
