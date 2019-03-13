<?php
require_once("../Header - Footer/header.php");
session_start();
if($_SESSION["username"] == null)
{
	header('Location: ../index.html');
}
?>
<title>Note Preview Page</title>
<style>
body {
	padding-top: 50px;
}
.amp-active {
	iframe {
		height: 0;
		max-height: 100%;
		max-width: 100%;
		min-height: 100%;
		min-width: 100%;
		width: 0;
	}
}
@media screen and (min-width: 768px) {
  .mobile-pdf{
    display: none;
  }
	.col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12 {
		padding-bottom: 20px;
	}
	.desktop-pdf{
		display: inline;
	}
}
@media screen and (max-width: 768px) {
  .desktop-pdf{
    display: none;
  }
	.mobile-pdf{
		display: inline;
	}
}

@supports (-webkit-overflow-scrolling: touch) {
	.desktop-pdf{
		display: none;
	}
	.mobile-pdf{
		display: inline;
	}
}

.submit-btn {
		background-color: #660099 !important;
}
.like-btn {
		background-color: #3CDB5D !important;
}
.dislike-btn {
		background-color: #FE4D4D !important;
}
.submit-font {
		color:#fff !important;
}
.submit-font:hover {
		color:#ecaa33 !important;
}
.col-xs-0 {
	display: none;
}

.like-dislike {
	color: #181818 !important;
}
.like-dislike:hover {
	color: #505050 !important;
}
#HCB_comment_box .submit {
		background:none; /* Clear twitter bootstrap style. */
		background-color:green;
		border:1px solid darkgreen;
		color: red;
}
</style>
<body>
  <div id="top" class="container-fluid" Style="padding-bottom:0px;">
  <div class="row">
    		<div class="col-sm-12 col-xs-12" style="padding-bottom:0px;">
<?php
require_once('config.inc.php');
$conn = new PDO("mysql:host=$database_host;dbname=$database_name", $database_user, $database_pass);
$conn2 = new mysqli($database_host, $database_user, $database_pass, "2018_comp10120_z3");
$id = isset($_GET['id'])? $_GET['id'] : "";
$NoteID2 = $_GET['id'];
$stat = $conn->prepare("SELECT * FROM Notes WHERE NoteID = ?");
$stat->bindParam(1, $id);
$stat->execute();
$row = $stat->fetch();
$syn = "SELECT Username FROM Users WHERE UserID =" . $row['UserID'];
$username = $conn2->query($syn)->fetch_object()->Username;

echo '<h1><u>';
echo $row['TitleNote'];
echo '</u></h1>';

echo '<h2>';
echo "Author: " . $username;
echo '</h2>';

echo '<h2>';
echo "Date: " . $row['DateOfPublish'];
echo '</h2><br>';
?>
</div>
</div>
  <div class="row">

<?php
$id = "view.php?id=" . $_GET['id'];

if ($row['dataType'] == "application/pdf")
{
?>
<div class="col-sm-2"></div>
<div class="col-sm-8 col-xs-12 mobile-pdf" style="padding-top:20px;">
<a href="<?php echo $id ?>" class="btn btn-block submit-btn submit-font" role="button">View PDF</a>
</div>
<div class="col-sm-2"></div>

<div class="col-sm-12 col-xs-12 amp-active desktop-pdf">
<div class="embed-responsive embed-responsive-4by3">
<p align="center">
<iframe src="<?php echo $id ?>"  >
</iframe></p>
</div>
</div>
</div>
<?php
}else {
?>
<div class="col-sm-2"></div>
    		<div class="col-sm-8">
		<img src="<?php echo $id ?>" style="width:100%; padding-bottom:20px;">
		</div>
<div class="col-sm-2"></div>
	</div>
<?php
}
?>

<div class="row" style="text-align:center;">
	<div class="col-sm-2"></div>
<!-- VOTING -->

   <?php
	$notes =  $_GET['id'];
	$userIDmain = $conn2->query("SELECT UserID FROM Users WHERE Username ='$_SESSION[username]'")->fetch_object()->UserID;//userID query
	if(isset($_POST['btn']))
	{
	     $query = "INSERT INTO `Votes`(`NoteID`, `UserID`, `type`) VALUES ('$notes', '$userIDmain', 1)";
    	     $conn->query($query);
             header('Location: '.$_SERVER['REQUEST_URI']);
	}
	else if(isset($_POST['btn2']))
	{
		$query = "DELETE FROM `Votes` WHERE NoteID = '$notes' AND UserID = '$userIDmain'";
    	     	$result = $conn2->query($query);
                header('Location: '.$_SERVER['REQUEST_URI']);
	}
  ?>
<div class="col-sm-4 col-xs-6">
<form action="" method="post">
<?php
$stat = $conn->prepare("SELECT * FROM `Votes` WHERE NoteID = '$notes' AND UserID = '$userIDmain'");
        $stat->execute();

$stat2 = $conn->prepare("SELECT * FROM `Votes` WHERE NoteID = '$notes' AND type = 1" );
$stat2->execute();
$counterLikes = 0;
while($row = $stat2->fetch())
{
  $counterLikes++;
}

if(($row = $stat->fetch()) != null)
{
  $typeVote = $row['type'];
  if($typeVote == 1)
  {
?>
  <button type="submit" class="btn btn-block like-btn submit-font like-dislike " method="post" value="Liked" name="btn2"><span><?php echo $counterLikes ?> </span><span class="glyphicon glyphicon-thumbs-up"> Liked</span></button>
<?php
  }
  else
  {
?>
<button type="submit" class="btn btn-block like-btn submit-font like-dislike" value="Like!" disabled><?php echo $counterLikes ?> <span class="glyphicon glyphicon-thumbs-up"> Like</span></button>
<?php
  }
}
else
{
?>
  <button type="submit" class="btn btn-block like-btn submit-font like-dislike" method="post" value="Like!" name="btn"><?php echo $counterLikes ?> <span class="glyphicon glyphicon-thumbs-up"> Like</span></button>
<?php
} ?>
</form>
</div>
   <?php
	$notes =  $_GET['id'];
	$userIDmain = $conn2->query("SELECT UserID FROM Users WHERE Username ='$_SESSION[username]'")->fetch_object()->UserID;//userID query
	if(isset($_POST['btn4']))
	{

	     $query = "INSERT INTO `Votes`(`NoteID`, `UserID`,  `type`) VALUES ('$notes', '$userIDmain' , -1)";
    	     $conn->query($query);
             header('Location: '.$_SERVER['REQUEST_URI']);
	}
	else if(isset($_POST['btn3']))
	{
		$query = "DELETE FROM `Votes` WHERE NoteID = '$notes' AND UserID = '$userIDmain'";
    	     	$result = $conn2->query($query);
		header('Location: '.$_SERVER['REQUEST_URI']);
	}
  ?>
<div class="col-sm-4 col-xs-6">
<form action="" method="post">
<?php
$stat = $conn->prepare("SELECT * FROM `Votes` WHERE NoteID = '$notes' AND UserID = '$userIDmain'");
        $stat->execute();


$stat2 = $conn->prepare("SELECT * FROM `Votes` WHERE NoteID = '$notes' AND type = -1" );
$stat2->execute();
$counterLikes = 0;
while($row = $stat2->fetch())
{
  $counterLikes++;
}

if(($row = $stat->fetch()) != null)
{
	$typeVote = $row['type'];

  if($typeVote == -1)
  {
  ?>
	<button type="submit" class="btn btn-block dislike-btn submit-font like-dislike" method="post" value="disLiked" name="btn3"><?php echo $counterLikes ?> <span class="glyphicon glyphicon-thumbs-down"> Disliked</span></button>
<?php
  }
  else
  {
  ?>
  <button type="submit" class="btn btn-block dislike-btn submit-font like-dislike" value="disLike" disabled><?php echo $counterLikes ?> <span class="glyphicon glyphicon-thumbs-down"> Dislike</span></button>
<?php
  }
}
else
{
?>
  <button type="submit" class="btn btn-block dislike-btn submit-font like-dislike" method="post" value="disLike" name="btn4"><?php echo $counterLikes ?> <span class="glyphicon glyphicon-thumbs-down"> Dislike</span></button>
<?php } ?>
</form>
</div>
<div class="col-sm-2"></div>
</div>
<div class="row">
<div class="col-sm-2"></div>
<div class="col-sm-8">
	<a href="<?php echo $id ?>" class="btn btn-block submit-btn submit-font" role="button" download="<?php echo $row['TitleNote'] ?>"><span class="glyphicon glyphicon-download-alt"></span> Download</a>
</div>
<div class"col-sm-2"></div>
</div>
<!-- COMMENTS-->
  <div class="row">
       <div class="col-sm-12" style="padding-top: 20px;">

<!-- begin wwww.htmlcommentbox.com -->
 <div id="HCB_comment_box" style="width:100%;"><a href="http://www.htmlcommentbox.com">Widget</a> is loading comments...</div>
 <link rel="stylesheet" type="text/css" href="//www.htmlcommentbox.com/static/skins/bootstrap/twitter-bootstrap.css?v=0" />
 <script type="text/javascript" id="hcb"> /*<!--*/ if(!window.hcb_user){hcb_user={};} (function(){var s=document.createElement("script"), l=hcb_user.PAGE || (""+window.location).replace(/'/g,"%27"), h="//www.htmlcommentbox.com";s.setAttribute("type","text/javascript");s.setAttribute("src", h+"/jread?page="+encodeURIComponent(l).replace("+","%2B")+"&opts=16862&num=10&ts=1550317288312");if (typeof s!="undefined") document.getElementsByTagName("head")[0].appendChild(s);})(); /*-->*/ </script>
<!-- end www.htmlcommentbox.com -->
       </div>
		 </div>
</div>
</body>
<footer>
  <div>
<?php
require_once("../Header - Footer/footer.html");
?>
  </div>
</footer>
</html>
