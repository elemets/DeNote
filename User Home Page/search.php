<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    require_once('config.inc.php');
    $conn = new mysqli($database_host, $database_user, $database_pass, "2018_comp10120_z3");
    echo $_POST['searchWord'];
    ?>
  </body>
</html>
