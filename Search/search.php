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
    <title></title>
  </head>
  <body>
    <?php
    echo "<h1> UnitID </h1>";
    require_once('config.inc.php');
    $conn = new PDO("mysql:host=$database_host;dbname=$database_name", $database_user, $database_pass);
    // $conn = new mysqli($database_host, $database_user, $database_pass, "2018_comp10120_z3");
    $searchWord = $_POST['searchWord'];
    $stat = $conn->prepare("SELECT * FROM Notes WHERE UnitID LIKE '%$searchWord%'");
    $stat->execute();
    if ($stat->num_rows > 0)
      echo "nothing found in this section";
    while($row = $stat->fetch())
    {
              echo "<li><a  href='../Notes Page/NotesPreview.php?id=".$row['NoteID']."'>".$row['FileName']."</a></li>";
    }

    echo "<h1> FileName </h1>";
    $stat = $conn->prepare("SELECT * FROM Notes WHERE FileName LIKE '%$searchWord%'");
    $stat->execute();
    if ($stat->num_rows > 0)
      echo "nothing found in this section";
    while($row = $stat->fetch())
    {
              echo "<li><a  href='../Notes Page/NotesPreview.php?id=".$row['NoteID']."'>".$row['FileName']."</a></li>";
    }


    echo "<h1> TitleNote </h1>";
    $stat = $conn->prepare("SELECT * FROM Notes WHERE TitleNote LIKE '%$searchWord%'");
    $stat->execute();
    if ($stat->num_rows > 0)
      echo "nothing found in this section";
    while($row = $stat->fetch())
    {
              echo "<li><a  href='../Notes Page/NotesPreview.php?id=".$row['NoteID']."'>".$row['FileName']."</a></li>";
    }


    echo "<h1> SectionNumber </h1>";
    $stat = $conn->prepare("SELECT * FROM Notes WHERE SectionNumber LIKE '%$searchWord%'");
    $stat->execute();
    if ($stat->num_rows > 0)
      echo "nothing found in this section";
    while($row = $stat->fetch())
    {
              echo "<li><a  href='../Notes Page/NotesPreview.php?id=".$row['NoteID']."'>".$row['FileName']."</a></li>";
    }


    echo "<h1> Username </h1>";
    $stat = $conn->prepare("SELECT * FROM Users");
    $stat->bindParam(1, $searchWord);
    $stat->execute();
    if ($stat->num_rows > 0)
      echo "nothing found in this section";
    while($row = $stat->fetch())
    {
      if ($row['Username'] == $searchWord || $row['Email'] == $searchWord)
      {
            echo "<li><a  href='../Profile Page/profile2.php?id=".$row['UserID']."'>".$row['Username']."</a></li>";
      }
    }
    ?>
  </body>
</html>
