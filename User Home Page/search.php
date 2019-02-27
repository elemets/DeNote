<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    require_once('config.inc.php');
    $conn = new PDO("mysql:host=$database_host;dbname=$database_name", $database_user, $database_pass);
    $conn = new mysqli($database_host, $database_user, $database_pass, "2018_comp10120_z3");
    $searchWord = $_POST['searchWord'];
    $userID = $conn2->query("SELECT UserID FROM Users WHERE Username ='$_SESSION[username]")->fetch_object()->UserID;//userID query
    $stat = $conn->prepare("SELECT * FROM Notes");
    $stat->bindParam(1, $searchWord);
    $stat->execute();

    while($row = $stat->fetch())
    {
      if ($row['FileName'] == $searchWord || $row['TitleNote'] == $searchWord || $row['UnitID'] == $searchWord )
      {
        echo "<li><a target='_blank' href='view.php?id=".$row['NoteID']."'>".$row['FileName']."</a></li>";
      }
      elseif ($searchWord == $conn2->query("SELECT Username FROM Users WHERE UserID = $row['UnitID']")->fetch_object()->Username)
      {
          echo "<li><a target='_blank' href='view.php?id=".$row['NoteID']."'>".$row['FileName']."</a></li>";
      }
    }
    ?>
  </body>
</html>
