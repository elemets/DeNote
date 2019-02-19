<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Profile Test</title>
  </head>
  <body>
    <?php
    require_once('config.inc.php');
    $conn = new PDO("mysql:host=$database_host;dbname=$database_name", $database_user, $database_pass);
    $stat = $conn->prepare("SELECT * FROM Notes");
    $stat->execute();

    while($row = $stat->fetch()){
      echo "<li><a target='_blank' href='profile-showingNotes.php?id=".$row['NoteID']."'>".$row['FileName']."</a></li>";
    }
     ?>
  </body>
</html>
