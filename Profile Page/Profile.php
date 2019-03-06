<?php
require_once("../Header - Footer/header.php");
session_start();
?>
<title>Page Title</title>
<style>
body {
	padding-top: 50px;
}
body > p {
	text-align: center;
}
.centered {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
	text-align: center;
}
.col-sm-3 {
	padding-bottom: 30px;
}
.container-fluid {
margin: 0px;
padding: 0px 0px;
}
</style>
<body>
<div id="top" class="container-fluid"> 

<!-- Title and profile icon -->
<div id="My_Profile" class="text-center">
  <h1 style="font-size:60px;padding-top: 55px;"><?php echo $_SESSION['username']; ?></h1>
  <?php
  require_once('config.inc.php');
  $conn = new PDO("mysql:host=$database_host;dbname=$database_name", $database_user, $database_pass);
  $conn2 = new mysqli($database_host, $database_user, $database_pass, "2018_comp10120_z3");
   ?>
  <img src="Icons/Profile_Icon.png" alt="" style="width: 250px; height: auto;">
</div>
<!-- My notes Section -->
<div id="My_notes" class="grid-container"></div>
      <h3 style="font-size: 50px; padding-top: 30px; padding-left: 60px">My notes</h3>
        <div class="jumbotron Container-fluid">
          
        </div>



<?php
$userID = $conn2->query("SELECT UserID FROM Users WHERE Username ='$_SESSION[username]'")->fetch_object()->UserID;//userID query
        $stat = $conn->prepare("SELECT  * FROM `Followers` WHERE FollowerUserID = '$userID'");
        $stat->execute();
        $count = 0;
        $usernameArray = array(); 
        $links = array();
        while($row = $stat->fetch()){
          $FollowedUserID = $row['FollowedUserID'];
          $syn = "SELECT Username FROM Users WHERE UserID =" . $row['FollowedUserID']; 
          $username = $conn2->query($syn)->fetch_object()->Username;
          array_push($usernameArray, $username);
          $link = "profile2.php?id=" . $FollowedUserID;
          array_push($links, $link);
          $count = $count + 1;
         } 

?>






  <div class="">
    <h3 style="font-size: 50px; padding-top: 30px; padding-left: 60px"> <?php echo $count;?> Followings</h3>
    <div class="jumbotron Container-fluid">
        <?php
         for($counter = 0; $counter < $count; $counter++)
         { ?>
          <a href= "<?php echo $links[$counter]; ?>"> <?php echo $usernameArray[$counter]; ?> </a>
<?php
}
?>
<?php
$userID = $conn2->query("SELECT UserID FROM Users WHERE Username ='$_SESSION[username]'")->fetch_object()->UserID;//userID query
        $stat = $conn->prepare("SELECT  * FROM `Followers` WHERE FollowedUserID = '$userID'");
        $stat->execute();
        $count = 0;
        $usernameArray = array(); 
        $links = array();
        while($row = $stat->fetch()){
          $FollowerUserID = $row['FollowerUserID'];
          $syn = "SELECT Username FROM Users WHERE UserID =" . $row['FollowerUserID']; 
          $username = $conn2->query($syn)->fetch_object()->Username;
          array_push($usernameArray, $username);
          $link = "profile2.php?id=" . $FollowerUserID;
          array_push($links, $link);
          $count = $count + 1;
         } 

?>
    </div>
  </div>
  <div class="">
    <h3 style="font-size: 50px; padding-top: 30px; padding-left: 60px"><?php echo $count;?> Followers</h3>
	<div class="jumbotron Container-fluid"> 
        <?php
         for($counter = 0; $counter < $count; $counter++)
         { ?>
          <a href= "<?php echo $links[$counter]; ?>"> <?php echo $usernameArray[$counter]; ?> </a>
<?php
}
?>
	</div>
  </div>

</div>
</div>
</body>
<?php
require_once("../Header - Footer/footer.html");
?>
</html>
