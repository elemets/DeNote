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
    $searchWord = $_POST['searchWord'];
    $stat = $conn->prepare("SELECT * FROM Notes WHERE * = ?");
    $stat->bindParam(1, $searchWord);
    $stat->execute();

    while($row = $stat->fetch()){
      echo "<li><a target='_blank' href='view.php?id=".$row['NoteID']."'>".$row['FileName']."</a></li>";
    }
    ?>
  </body>
</html>
