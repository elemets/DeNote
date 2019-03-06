<?php
session_start();
  require_once('config.inc.php');
  $conn = new PDO("mysql:host=$database_host;dbname=$database_name", $database_user, $database_pass);
  $conn2 = new mysqli($database_host, $database_user, $database_pass, "2018_comp10120_z3");
echo $_SESSION['username'];
  $userID = $conn2->query("SELECT UserID FROM Users WHERE Username ='$_SESSION[username]'")->fetch_object()->UserID;//userID query
        $stat = $conn->prepare("SELECT  * FROM `Followers` WHERE FollowerUserID = '$userID'");
        $count = 0;
        while($row = $stat->fetch()){
          $FollowedUserID = $row['FollowedUserID'];
          echo $FollowedUserID;
          $count = $count + 1;
}
?>
