<?php
require_once("../Header - Footer/header.php");
session_start();
if($_SESSION["username"] == null)
{
	header('Location: ../index.html');
}
?>
<title>Profile</title>
<style>
</style>
<body>
<div id="top" class="container-fluid">

<?php
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
       $UnitIDInField = array();
    while($row = $stat->fetch())
    {
      if (!in_array($row['UnitID'], $UnitIDInField))
      {
?>
            <a <?php  echo"<a href='../User Home Page/ShowNotes.php?id=".$row['UnitID']."&UnitYear=".$row['UnitYear']."'>"; ?>
            <?php echo $row['UnitID']?>
            </a>
            </br>
<?php
            array_push($UnitIDInField, $row['UnitID']);
      }
    }
    if ($stat->rowCount() == 0)
    {
      echo "nothing found in this section";
    }



    echo "<h1> Notes </h1>";
    $stat = $conn->prepare("SELECT * FROM Notes WHERE TitleNote LIKE '%$searchWord%'");
    $stat->execute();
    while($row = $stat->fetch())
    {
              echo "<li><a  href='../Notes Page/NotesPreview.php?id=".$row['NoteID']."'>".$row['TitleNote']."</a></li>";
    }


    $stat2 = $conn->prepare("SELECT * FROM Notes WHERE SectionNumber LIKE '%$searchWord%'");
    $stat2->execute();
    while($row = $stat2->fetch())
    {
              echo "<li><a  href='../Notes Page/NotesPreview.php?id=".$row['NoteID']."'>".$row['FileName']."</a></li>";
    }
    if ($stat->rowCount() == 0 && $stat2->rowCount() == 0)
    {
      echo "nothing found in this section";
    }


    echo "<h1> Username </h1>";
    $stat = $conn->prepare("SELECT * FROM Users WHERE Username LIKE '%$searchWord%' AND Username != 'ADMIN'");
    $stat->execute();
    while($row = $stat->fetch())
    {
            echo "<li><a  href='../Profile Page/profile2.php?id=".$row['UserID']."'>".$row['Username']."</a></li>";
    }
    if ($stat->rowCount() == 0)
    {
      echo "nothing found in this section";
    }

    ?>
</div>
</body>
<?php
require_once("../Header - Footer/footer.html");
?>
</html>
