<?php
require_once("../Header - Footer/header.php");
session_start();
if($_SESSION["username"] == null)
{
	header('Location: ../index.html');
}
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

#HCB_comment_box #hcb_form_content,
#HCB_comment_box #hcb_form_email,
#HCB_comment_box #hcb_form_name,
#HCB_comment_box #hcb_form_website {
	background-color:#faf2ff;
}

input#HCB_submit .submit {
	background-color: #faf2ff ;
	border:1px solid #faf2ff;
	color: #faf2ff;
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
<div class="row">
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
<div class="row">
		 <div class="col-sm-12 container" style="padding-left: 20px;">


<!-- begin wwww.htmlcommentbox.com -->
 <div id="HCB_comment_box" style="width:100%;"><a href="http://www.htmlcommentbox.com">Widget</a> is loading comments...</div>
 <link rel="stylesheet" type="text/css" href="//www.htmlcommentbox.com/static/skins/bootstrap/twitter-bootstrap.css?v=0" />
 <script type="text/javascript" id="hcb"> /*<!--*/ if(!window.hcb_user){hcb_user={};} (function(){var s=document.createElement("script"), l=hcb_user.PAGE || (""+window.location).replace(/'/g,"%27"), h="//www.htmlcommentbox.com";s.setAttribute("type","text/javascript");s.setAttribute("src", h+"/jread?page="+encodeURIComponent(l).replace("+","%2B")+"&opts=16862&num=10&ts=1550317288312");if (typeof s!="undefined") document.getElementsByTagName("head")[0].appendChild(s);})(); /*-->*/ </script>
<!-- end www.htmlcommentbox.com -->
			</div>
	</div>
</body>
<?php
require_once("../Header - Footer/footer.html");
?>
</html>
