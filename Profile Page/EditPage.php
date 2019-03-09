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
      <input type="textbox" class="form-control form-element" name="username" placeholder="Username" pattern="[^<>]+">

      <!--PASSWORD-->
      <label for="password">Password (8+ characters, mustn't contain <>)</label>
      <input type="password" class="form-control form-element" name="password" placeholder="Password" pattern="[a-zA-Z0-9!?@#$%*-/+_]{8,}">

    </form>
  </body>
</html>
