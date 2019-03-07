<?php
session_start();
require_once("../Header - Footer/header.php");
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
</style>
<body>
	<div id="top" class="container-fluid">
		<div class="row">
		<h1 style="padding-bottom:30px; padding-left: 15px;"><?php echo $_GET['id']; ?></h1>
</div>
			<div class="row">
<?php
require_once('config.inc.php');
$conn = new PDO("mysql:host=$database_host;dbname=$database_name", $database_user, $database_pass);
$id = isset($_GET['id'])? $_GET['id'] : "";
$UnitYear = isset($_GET['UnitYear'])? $_GET['UnitYear'] : "";
$stat = $conn->prepare("SELECT * FROM Notes WHERE UnitID = ? AND UnitYear = ?");
$stat->bindParam(1, $id);
$stat->bindParam(2, $UnitYear);
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
</div>
</body>
<?php
require_once("../Header - Footer/footer.html");
?>
</html>
