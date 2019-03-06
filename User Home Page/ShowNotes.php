<?php
require_once("../Header - Footer/header.php");
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
}
</style>
<body>
	<div id="top" class="container-fluid">
		<div class="row">
		<h1 style="padding-bottom:30px;"><?php echo $_GET['id']; ?></h1>
</div>
			<div class="row">
<?php
session_start();
require_once('config.inc.php');
$conn = new PDO("mysql:host=$database_host;dbname=$database_name", $database_user, $database_pass);
$id = isset($_GET['id'])? $_GET['id'] : "";
$UnitYear = isset($_GET['UnitYear'])? $_GET['UnitYear'] : "";
$stat = $conn->prepare("SELECT * FROM Notes WHERE UnitID = ? AND UnitYear = ?");
$stat->bindParam(1, $id);
$stat->bindParam(2, $UnitYear);
$stat->execute();
    while($row = $stat->fetch()){
?>
	<div class="col-sm-3">
		      <a <?php echo "href='../Notes Page/NotesPreview.php?id=".$row['NoteID']."'>"; ?>
					<img src="squareElement.png" style="width:100%">
			        <div class="centered"><h2 style="color: #fff;"><?php echo $row['FileName'] ?></h2></div>
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
