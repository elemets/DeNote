<?php
require_once("../Header - Footer/header.php");
session_start();
?>
<title>Note Preview Page</title>
<style>
body {
	padding-top: 50px;
}
.ios-scroll{
	-webkit-overflow-scrolling: touch;
  	overflow-y: scroll;
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
}
@media screen and (max-width: 768px) {
  .desktop-pdf{
    display: none;
  }
}
.submit-btn {
		background-color: #660099 !important;
}
.submit-font {
		color:#ffffff !important;
}
.submit-font:hover {
		color:#ecaa33 !important;
}
</style>
<body>
  <div id="top" class="container-fluid">
  <div class="row">
    		<div class="col-sm-12">
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

echo '<h1>';
echo $row['TitleNote'];
echo '</h1>';

echo '<h2>';
echo "Author: " . $username;
echo '</h2>';

echo '<h2 style="padding-bottom:20px;.">';
echo "Date Of Publish: " . $row['DateOfPublish'];
echo '</h2>';
?>
        </div>
<?php
$id = "view.php?id=" . $_GET['id'];



if ($row['dataType'] == "application/pdf")
{
?>
		 <div class="col-sm-12 amp-active" style="padding-bottom:50px;">
<div class="embed-responsive embed-responsive-4by3 ios-scroll desktop-pdf">
<p align="center">
  <iframe src="<?php echo $id ?>"  >
</iframe></p>
</div>
<a href="<?php echo $id ?>" class="btn btn-lg submit-btn submit-font" role="button" download="<?php echo $row['TitleNote'] ?>">Download</a>

<div class="mobile-pdf" style="padding-top:50px;">
<a href="<?php echo $id ?>" class="btn btn-lg submit-btn submit-font" role="button">View PDF</a>
</div>

</div>
<?php
}else {
?>
    		<div class="col-sm-12">
		<img src="<?php echo $id ?>" style="width:100%; padding-bottom:20px;">
<a href="<?php echo $id ?>" class="btn btn-lg submit-btn submit-font" role="button" download="<?php echo $row['TitleNote'] ?>">Download</a>
</div>

<?php
}
?>

<!-- VOTING -->

   <?php
	$usernameMain = "$_SESSION[username]";
	if(isset($_POST['btn']))
	{
		echo "I am btn";
		echo $_GET['id'];
		echo $usernameMain;
	     $query = "INSERT INTO `Votes`(`NoteID`, `UserID`) VALUES ('$NoteID2','$usernameMain')";
    	     $result = $conn->query($query);
	}
	else if(isset($_POST['btn2']))
	{
		echo "I am btn2";
		$query = "DELETE FROM `Votes` WHERE NoteID = '$NoteID2' AND UserID = '$usernameMain'";
    	     	$result = $conn->query($query);
	}
  ?>
<form action="" method="post"> 
<?php
$stat = $conn->prepare("SELECT * FROM `Votes` WHERE NoteID = '$NoteID2' AND UserID = '$usernameMain'");
        $stat->execute();
if($row = $stat->fetch() != null)
{
?>
  <input type="submit" class="btn btn-danger" method="post" value="Liked" name="btn2">
<?php
}
else
{
?>
  <input type="submit" class="btn btn-primary" method="post" value="Like!" name="btn"> 
<?php } ?>
</form>







<!-- COMMENTS-->
       <div class="col-sm-12">
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
