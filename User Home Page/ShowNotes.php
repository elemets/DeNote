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
</style>
<body>
		<h1><?php echo $_GET['id']; ?></h1>
</br>
</br>
</br>
<div id="top" class="container-fluid">
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
			    <div class="thumbnail">
<?php echo"<a href='../Notes Page/NotesPreview.php?id=".$row['NoteID']."'>"; ?>
			        <img src="squareElement.png" style="width:100%">
			        <div class="caption">
			          <p><?php echo $row['FileName'] ?></p>
			        </div>
			      </a>
			    </div>
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
