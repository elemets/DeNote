<?php
session_start();
if($_SESSION["username"] == null)
{
	header('Location: ../index.html');
}

require_once("../Header - Footer/header.php");
require_once('config.inc.php');
$syn = "SELECT Username FROM Users WHERE UserID =" . $_GET['id'];
$userID = $_GET['id'];
$conn2 = new mysqli($database_host, $database_user, $database_pass, "2018_comp10120_z3");
$userIDmain = $conn2->query("SELECT UserID FROM Users WHERE Username ='$_SESSION[username]'")->fetch_object()->UserID;//userID query
if($userIDmain == $userID)
{
header('Location: ../Profile Page/Profile.php');
}
$username = $conn2->query($syn)->fetch_object()->Username;
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
  <h1 style="font-size:60px;padding-top: 55px;"><?php echo $username; ?></h1>
  <?php
  require_once('config.inc.php');
  $conn = new PDO("mysql:host=$database_host;dbname=$database_name", $database_user, $database_pass);
  $conn2 = new mysqli($database_host, $database_user, $database_pass, "2018_comp10120_z3");
  $link = "Location: https://web.cs.manchester.ac.uk/a64508sa/Z3_Y1_Project/Profile%20Page/profile2.php?id=" . $userID;
   ?>
  <img src="Icons/Profile_Icon.png" alt="" style="width: 250px; height: auto;">

<?php
  if ($userIDmain == "-1")
  {
  }
  else
  {
?>
<!-- FOLLOWING BUTTONS -->
<?php   
	if(isset($_POST['btn']))
	{
	     $query = "INSERT INTO `Followers`(`FollowerUserID`, `FollowedUserID`) VALUES ('$userIDmain','$userID')";
    	     $result = $conn->query($query);
	     header('Location: '.$_SERVER['REQUEST_URI']);
	}
	else if(isset($_POST['btn2']))
	{
		$query = "DELETE FROM `Followers` WHERE `FollowerUserID`= '$userIDmain' AND `FollowedUserID`= '$userID' ";
    	     	$result = $conn->query($query);
		header('Location: '.$_SERVER['REQUEST_URI']);
	}
  ?>
<form action="" method="post">
<?php
$stat = $conn->prepare("SELECT  * FROM `Followers` WHERE FollowedUserID = '$userID' AND FollowerUserID = '$userIDmain' ");
        $stat->execute();
if($row = $stat->fetch() != null)
{
?>
  <input type="submit" class="btn btn-danger" method="post" value="Unfollow" name="btn2">
<?php
}
else
{
?>
  <input type="submit" class="btn btn-primary" method="post" value="Follow me" name="btn">
<?php } ?>
</form>


</div>
<?php     }//else ?>
<!-- My notes Section -->
<div id="My_notes" class="grid-container"></div>
      <h3 style="font-size: 50px; padding-top: 30px; padding-left: 60px"><?php echo $username; ?>'s notes</h3>
        <div class="jumbotron Container-fluid">
<div class="row">
	<?php
    	$stat = $conn->prepare("SELECT * FROM Notes WHERE UserID = ?");
    	$stat->bindParam(1, $_GET['id']);
    	$stat->execute();

    	while($row = $stat->fetch()){
	$noteID = $row['NoteID'];
		$stat2 = $conn->prepare("SELECT * FROM `Votes` WHERE NoteID = '$noteID'");
		$stat2->execute();
		$counterLikes = 0;
		$counterDislikes = 0;
		while($row2 = $stat2->fetch())
		{
			if($row2['type'] == 1)
  				$counterLikes++;
			else
				$counterDislikes++;
		}
	?>
	<div class="col-sm-3">
		      <a <?php echo "href='../Notes Page/NotesPreview.php?id=".$row['NoteID']."'>"; ?>
					<img src="squareElement.png" style="width:100%">
			        <div class="centered"><h2 style="color: #fff;"><?php echo $row['TitleNote'];?>
					</br> Likes: <?php echo $counterLikes; ?>
					</br> Dislikes: <?php echo $counterDislikes; ?></h2></div>
				  </a>
        </div>
<?php
}
?>
</div>

<?php
$userID = $conn2->query("SELECT UserID FROM Users WHERE Username ='$username'")->fetch_object()->UserID;//userID query
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
$userID = $conn2->query("SELECT UserID FROM Users WHERE Username ='$username'")->fetch_object()->UserID;//userID query
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
