<?php
require_once("../Header - Footer/header.php");
?>
<title>Note Preview Page</title>
<style>
body {
	padding-top: 50px;
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
		 <div class="col-sm-12" style="padding-bottom:50px;">
<div class="embed-responsive embed-responsive-4by3">
<p align="center">
  <iframe src="<?php echo $id ?>"  >

</iframe></p>
</div>
</div>
<?php
}else {
?>
    		<div class="col-sm-9" style="margin:0% 12.5%;">
		<img src="<?php echo $id ?>" style="width: 100%;">
</div>

<?php
}
?>
       <div class="col-sm-12" style="margin:0% 5%;">
<!-- begin wwww.htmlcommentbox.com -->
 <div id="HCB_comment_box" style="width:80%;margin-left:10%"><a href="http://www.htmlcommentbox.com">Widget</a> is loading comments...</div>
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
