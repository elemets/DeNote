<?php
session_start();
if($_SESSION["username"] == null)
{
	header('Location: ../index.html');
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Edit Profile</title>
  </head>
  <body>
    <?php require_once("database.php"); ?>
    <form method="post" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">

      <!--USERNAME-->
      <label for="username">Username (mustn't contain <>)</label>
      <br>
      <input type="textbox" name="newUsername" placeholder="Username" pattern="[^<>]+" placeholder="<?php echo $_SESSION[username];?>" disabled>

      <br>

      <!--PASSWORD-->
      <label for="password">Password (8+ characters, mustn't contain <>)</label>
      <br>
      <input type="password" name="newPassword" placeholder="Password" pattern="[a-zA-Z0-9!?@#$%*-/+_]{8,}">

      <br>

      <label for="year">Year of Study</label>
      <br>
      <select name="newYear">
        <option>Year 0</option>
        <option>Year 1</option>
        <option>Year 2</option>
        <option>Year 3</option>
        <option>Other</option>
      </select>

      <!--SUBMIT-->
      <input type="submit" class="btn btn-default btn-lg submit-btn btn-block submit-font bottom-buffer" value="Edit">
    </form>

    <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST")
      {
  	    $newUsername = $_POST["newUsername"];
        $newPassword = $_POST["newPassword"];
    	  $newYear = $_POST["newYear"];

        $oldUsername = $_SESSION['username'];

    	  if(edit($newUsername, $newPassword, $newYear, $oldUsername)) {
          echo "I am working";
         //header('Location: ../Profile Page/Profile.php');
    	  } else {
          echo "Wrong";
        }
      }
    ?>
  </body>
</html>
