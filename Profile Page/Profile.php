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
h3 {
  color: black;
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

#HCB_comment_box{border:2px solid #660099;border-radius:5px;padding:10px;color:#white;background:#660099}.hcb-mod b{color:white}
#HCB_comment_box textarea,
#HCB_comment_box input.text{border-top:1px solid #e4e4e4;border-left:1px solid #e4e4e4;border-bottom:1px solid #eaeaea;border-right:1px solid #eaeaea;background-color:#f8f8f8}
#HCB_comment_box .hcb-wrapper-half{display:block;width:50%;float:left}
#HCB_comment_box .hcb-wrapper{clear:both}
#HCB_comment_box input.text{display:block;width:95%}
#HCB_comment_box input.submit{
  display: inline-block;
  padding: 15px 25px;
  font-size: 24px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  outline: none;
  color: #660099;
  background-color: #660099;
  border: none;
}

#HCB_comment_box input.submit.button:hover {background-color: #3e8e41}

#HCB_comment_box input.submit.button:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
#HCB_comment_box div.comment{color:black;background:white;border:3px double #660099;margin:5px;padding:2px}
#HCB_comment_box .comment .likes{color:#0f0}
#HCB_comment_box .hcb-link{color:#0088af;text-decoration:none}
#HCB_comment_box a.btn{background:none; background-color:#660099; border:1px solid darkgreen; color:white;}

</style>

<body>
<div id="top" class="container-fluid">

<!-- Title and profile icon -->
<div class="text-center">
  <h1 style="font-size:60px;padding-top: 55px;"><?php echo $_SESSION['username']; ?></h1>
  <?php
  require_once('config.inc.php');
  $conn = new PDO("mysql:host=$database_host;dbname=$database_name", $database_user, $database_pass);
  $conn2 = new mysqli($database_host, $database_user, $database_pass, "2018_comp10120_z3");
   ?>
  <img src="Icons/Profile_Icon.png" alt="" style="width: 250px; height: auto;">
</div>


<!-- My notes Section -->
<div class="row">
	<div class="col-sm-12">
      <h3 style="font-size: 50px; padding-top: 30px; padding-bottom: 15px;">My notes</h3>
	</div>

	<?php
    	$userID = $conn2->query("SELECT UserID FROM Users WHERE Username ='$_SESSION[username]'")->fetch_object()->UserID;//userID query
    	$stat = $conn->prepare("SELECT * FROM Notes WHERE UserID = ?");
    	$stat->bindParam(1, $userID);
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
			        <div class="centered"><h2 style="color: #fff;">
					<?php echo $row['TitleNote'];?>
					</br> Likes: <?php echo $counterLikes; ?>
					</br> Dislikes: <?php echo $counterDislikes; ?></h2></div>
				  </a>
        </div>
<?php
}
?>
</div>
<!-- My notes Section End -->

<!-- Following Section -->
<div class="row">
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

	<div class="col-sm-12">
    <h3 style="font-size: 50px; padding-top: 30px; padding-bottom: : 15px"> <?php echo $count;?> Followings</h3>
	</div>
        <?php
         for($counter = 0; $counter < $count; $counter++)
         { ?>
					<div class="col-sm-3">
         <a href= "<?php echo $links[$counter]; ?>">
        <img src="squareElement.png" style="width:100%">
								<div class="centered"><h2 style="color: #fff;">
         <?php echo $usernameArray[$counter]; ?>
			 </div>
			 </a>
		 </div>
<?php
}
?>
</div>
<!-- Following Section End -->
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
  <div class="">
    <h3 style="font-size: 50px; padding-top: 30px; padding-left: 60px"><?php echo $count;?> Followers</h3>
        <?php
         for($counter = 0; $counter < $count; $counter++)
         { ?>
          <a href= "<?php echo $links[$counter]; ?>"> <?php echo $usernameArray[$counter]; ?> </a>
<?php
}
?>

  </div>

</div>

</body>
<?php
require_once("../Header - Footer/footer.html");
?>
</html>
