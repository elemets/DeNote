<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Edit Profile</title>
  </head>
  <body>
    <form method="post" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">

      <!--USERNAME-->
      <label for="username">Username (mustn't contain <>)</label>
      <input type="textbox" name="username" placeholder="Username" pattern="[^<>]+">

      <br>

      <!--PASSWORD-->
      <label for="password">Password (8+ characters, mustn't contain <>)</label>
      <input type="password" name="password" placeholder="Password" pattern="[a-zA-Z0-9!?@#$%*-/+_]{8,}">

      <br>

      <!--SUBMIT-->
      <input type="submit" class="btn btn-default btn-lg submit-btn btn-block submit-font bottom-buffer" value="Sign Up">
    </form>
  </body>
</html>
