<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<head>
	<meta charset="UTF-8">
        <title> Sign Up page </title>
</head>
</head>
<body>
<h1 class ="intro"> sign Up page </h1> <br>

	<ul id="nava">
  		<li class="bar-li"><a   class="bar-lisa"  href="index.php">Sign In </a></li>
		<li class="bar-li"><a   class="bar-lisa"  href="signUp.php">Sign Up </a></li>

	</ul>
	<br>

	<p>please fill the fields with your details: </p> <br>




<?php
require_once("database.php");
?>





<form method="post" action=""<?php echo $_SERVER['PHP_SELF'];?>">
	<fieldset>
		<legend>Sign Up</legend>
		username:<br>
		<input type="text" name = Username><br><br>
		email:<br>
		<input type="text" name = email><br><br>
		password:<br>
		<input type="text" name = password><br><br>
		<input type="submit" value="Submit">
	</fieldset>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
 {
	 $username = $_POST["Username"];
	 $password = $_POST["password"];
	 $email = $_POST["email"];

	 if(register($username, $password, $email)) {

	 } else {
		 // Incorrect Login
	 }
	}
?>

</body>
</html>
