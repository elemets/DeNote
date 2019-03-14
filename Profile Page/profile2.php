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
  transform: translate(-50%, -100%);
	text-align: center;
}
.col-sm-2 {
	padding-bottom: 30px;
}
.col-sm-12 h3 {
	font-size: 19px;
	text-transform: uppercase;
	color: white;
	font-weight: 400;
	padding: 0px;
	margin: 0px;
}
.col-sm-12 p {
	font-size: 19px;
	text-transform: uppercase;
	color: red;
	font-weight: 400;
	padding: 0px;
	margin: 0px;
}
.img-circle {
    border-radius: 50%;
}
.col-center {
	float: none;
	margin: 0 auto;
}
}
.bottom-buffer {
		margin-bottom:20px;
}
.submit-btn {
		background-color: #660099;
		border-radius: 5px;
}
.submit-btn:hover {
		background-color: #660099;
		border-radius: 5px;
}
.delete-btn {
	background-color: #D90000!important;
	border-radius: 5px!important;
}
.delete-btn:hover {
	background-color: #D90000!important;
	border-radius: 5px!important;
}
.submit-font {
		color:#ffffff;
}
.submit-font:hover {
		color:#ecaa33;
}
</style>

<body>
<div id="top" class="container-fluid">

<!-- Title and profile icon -->
<?php
require_once('config.inc.php');
$syn = "SELECT Username FROM Users WHERE UserID =" . $_GET['id'];
$userID = $_GET['id'];
$conn = new PDO("mysql:host=$database_host;dbname=$database_name", $database_user, $database_pass);
$conn2 = new mysqli($database_host, $database_user, $database_pass, "2018_comp10120_z3");
$userIDmain = $conn2->query("SELECT UserID FROM Users WHERE Username ='$_SESSION[username]'")->fetch_object()->UserID;//userID query
if($userIDmain == $userID)
{
header('Location: ../Profile Page/Profile.php');
}
$username = $conn2->query($syn)->fetch_object()->Username;
$userYear = $conn2->query("SELECT YearOfStudent FROM Users WHERE UserID ='$userID'")->fetch_object()->YearOfStudent;
?>

<div class="row">
<div class="col-sm-3 col-center" Style="max-width: 350px;">
<img src="squareElement.png" style="width:100%" class="img-circle">
			<div class="centered"><h1 style="color: #fff; font-size: 40px;">
				<?php echo $username; ?>
				<?php echo $userYear; ?>
			</div>
</div>

<?php
  $link = "Location: https://web.cs.manchester.ac.uk/a64508sa/Z3_Y1_Project/Profile%20Page/profile2.php?id=" . $userID;

  if(isset($_POST['btnDelete']))
  {
    $deleteQuery = "DELETE FROM `Notes` WHERE UserID = '$userID'";
    $result = $conn->query($deleteQuery);
    $deleteFollow = "DELETE FROM `Followers` WHERE FollowerUserID = '$userID'";
    $result = $conn->query($deleteFollow);
    $deleteFollowed = "DELETE FROM `Followers` WHERE FollowedUserID = '$userID'";
    $result = $conn->query($deleteFollowed);
    $deleteUser = "DELETE FROM `Users` WHERE UserID = '$userID'";
    $result = $conn->query($deleteUser);
    header('Location: Profile.php');
  }
  if ($userIDmain == "-1")
  {
?>
<div class="col-sm-3 col-center" style="padding-top: 15px;">
    <form action="" method="post">
    <input type="submit" class="btn btn-default btn-block btn-sm delete-btn submit-font bottom-buffer" method="post" value="delete User" name="btnDelete">
    </form>
	</div>
<?php
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
<div class="col-sm-3 col-center" style="padding-top: 15px;">
<form action="" method="post">
<?php
$stat = $conn->prepare("SELECT  * FROM `Followers` WHERE FollowedUserID = '$userID' AND FollowerUserID = '$userIDmain' ");
        $stat->execute();
if($row = $stat->fetch() != null)
{
?>
  <input type="submit" class="btn btn-default btn-block btn-sm delete-btn submit-font bottom-buffer" method="post" value="Unfollow" name="btn2">
<?php
}
else
{
?>
  <input type="submit" class="btn btn-default btn-block btn-sm submit-btn submit-font bottom-buffer" method="post" value="Follow me" name="btn">
<?php } ?>
</form>
</div>

<?php     }//else ?>
</div>



<!-- My notes Section -->

<div class="row">
	<div class="col-sm-12">
			<h3 style="font-size: 30px; padding-top: 30px; padding-bottom: 15px; color: black;"><?php echo $username; ?>'s Notes</h3>
		</div>

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
				<div class="col-sm-2 col-xs-6">
		      <a <?php echo "href='../Notes Page/NotesPreview.php?id=".$row['NoteID']."'>"; ?>
								<img src="squareElement.png" style="width:100%">
										<div class="centered"><h3 style="color: #fff;">
											<?php echo $row['TitleNote'];?>
								<br> Likes: <?php echo $counterLikes; ?>
							<br> Dislikes: <?php echo $counterDislikes; ?></h3></div>
								</a>
							</div>
<?php
}
?>
</div>

<!-- My notes Section End -->

<!-- My Following Section -->
<div class="row">
	<div class="col-sm-12">
			<h3 style="font-size: 30px; padding-top: 30px; padding-bottom: 15px; color: black;"><?php echo $username; ?>'s Following</h3>
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


         for($counter = 0; $counter < $count; $counter++)
         {
?>
					<div class="col-sm-2 col-xs-6">
						<a href= "<?php echo $links[$counter]; ?>">
						<img src="squareElement.png" style="width:100%" class="img-circle">
									<div class="centered"><h3 style="color: #fff;">
									<?php echo $usernameArray[$counter]; ?></h3>
										</div>
						</a>
					</div>
<?php
}//for
?>
</div>
<!-- My Following Section End-->

<!-- My Followers Section -->
<div class="row">
	<div class="col-sm-12">
			<h3 style="font-size: 30px; padding-top: 30px; padding-bottom: 15px; color: black;"><?php echo $username; ?>'s Followers</h3>
		</div>

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

         for($counter = 0; $counter < $count; $counter++)
         { ?>
					<div class="col-sm-2 col-xs-6">
						<a href= "<?php echo $links[$counter]; ?>">
						<img src="squareElement.png" style="width:100%" class="img-circle">
									<div class="centered"><h3 style="color: #fff;">
									<?php echo $usernameArray[$counter]; ?></h3>
										</div>
						</a>
					</div>
<?php
} // for
?>
</div>
</div>
</body>
<?php
require_once("../Header - Footer/footer.html");
?>
</html>
