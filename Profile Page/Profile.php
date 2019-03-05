<!DOCTYPE html>
<html lang="en">
<head>
<title>Profile Page</title>
<?php
require_once("../Header - Footer/header.php");
?>
<!-- Bootstrap CSS -->

</head>
<body id="top">

<!-- Title and profile icon -->
<div id="My_Profile" class="text-center">
  <h1 style="font-size:60px;padding-top: 55px;">My Profile</h1>
  <?php
  session_start();
  require_once('config.inc.php');
  $conn = new PDO("mysql:host=$database_host;dbname=$database_name", $database_user, $database_pass);
  $conn2 = new mysqli($database_host, $database_user, $database_pass, "2018_comp10120_z3");
  echo $_SESSION['username'];
  $userID = $conn2->query("SELECT UserID FROM Users WHERE Username ='$_SESSION[username]'")->fetch_object()->UserID;//userID query
  $stat = $conn->prepare("SELECT * FROM Notes WHERE UserID = '$userID'");
  $stat->bindParam(1, $userID);
  $stat->execute();

  //gets the userid of the users you are following and then displays their uploaded notes
  $followerName = $conn2->query("SELECT FollowedUserID FROM `Followers` WHERE FollowerUserID = '$userID'")->fetch_object()->FollowedUserID;
  $followerID = $conn2->query("SELECT FollowedUserID FROM `Followers` WHERE FollowerUserID = '$userID'")->fetch_object()->FollowedUserID;
  $followerName = $conn2->query("SELECT Username FROM `Users` WHERE UserID = '$followerID'")->fetch_object()->Username;
  echo "you are following $followerName";

  $stat2 = $conn->prepare("SELECT * FROM Notes WHERE UserID = '$followerID'");
  $stat2->bindParam(1, $followerID);
  $stat2->execute();

  while($row = $stat->fetch()){
    echo "<li><a href='../Notes Page/NotesPreview.php?id=".$row['NoteID']."'>".$row['FileName']."</a></li>";

  }
  while($row = $stat2->fetch()){
    echo "<li><a href='../Notes Page/NotesPreview.php?id=".$row['NoteID']."'>".$row['FileName']."</a></li>";

  }
   ?>
  <img type="file" name="requiredFile" accept=".png,.jpg" src="Icons/Profile_Icon.png" alt="" style="width: 250px; height: auto;">

                    <input type="submit" class="btn btn-default btn-lg submit-btn btn-block submit-font bottom-buffer" value="Submit" name="btn">

<?php
if(isset($_POST['btn']))
{
require_once('config.inc.php');
// Connect to the database
 $conn = new PDO("mysql:host=$database_host;dbname=$database_name", $database_user, $database_pass);
 $conn2 = new mysqli($database_host, $database_user, $database_pass, "2018_comp10120_z3");

 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$userID = $conn2->query("SELECT UserID FROM Users WHERE Username ='$_SESSION[username]'")->fetch_object()->UserID;
$type = $_FILES['requiredFile']['type'];
$data = file_get_contents($_FILES['requiredFile']['tmp_name']);
$stmt = $conn->prepare("INSERT INTO ProfilePic (`UnitID`,`type`,`data`) VALUES (?,?,?)");
  $stmt->bindParam(1, $unitID);
  $stmt->bindParam(2, $type);
  $stmt->bindParam(3, $data);
  $stmt->execute();
}
?>
</div>
<!-- My notes Section -->
<div id="My_notes" class="grid-container"></div>
      <h3 style="font-size: 50px; padding-top: 30px; padding-left: 60px">My notes</h3>
        <div class="jumbotron Container-fluid">
          <img src="Icons/Notes_Icons/PurpleNoHover.png" class="hoverable" alt="Purple background for note thumbnail">
          <div class="centered">COMP16212</div>
        </div>

  <div class="">
    <h3 style="font-size: 50px; padding-top: 30px; padding-left: 60px">Following</h3>
    <div class="jumbotron Container-fluid">
      <?php

      ?>

    </div>
  </div>
  <div class="">
    <h3 style="font-size: 50px; padding-top: 30px; padding-left: 60px">My Followers</h3>

  </div>


</body>
<footer>
<?php
require_once("../Header - Footer/footer.html");
?>
</footer>
</html>
