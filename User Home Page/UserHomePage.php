<?php
session_start();
?>
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
	<?php
	$_SESSION["username"] = $_SESSION["username"]
	?>
  <div id="top" class="container-fluid">
	  <div class="row">
	<h1 style="padding-bottom:30px;">Hello <?php echo $_SESSION["username"]; ?></h1>
</div>
			<div class="row">
<?php
	require_once('config.inc.php');
    	// Connect to the database
     	$conn = new PDO("mysql:host=$database_host;dbname=$database_name", $database_user, $database_pass);
     	$conn2 = new mysqli($database_host, $database_user, $database_pass, "2018_comp10120_z3");
	$UnitYear = $conn2->query("SELECT YearOfStudent FROM Users WHERE Username ='$_SESSION[username]'")->fetch_object()->YearOfStudent;//YearOfStudent query
	$stat = $conn->prepare("SELECT * FROM Notes WHERE UnitYear = ?");
   	$stat->bindParam(1, $UnitYear);
   	$stat->execute();
        $UnitIDInField = array();

	while($row = $stat->fetch()){
	if (!in_array($row['UnitID'], $UnitIDInField))
      {
?>


		<div class="col-sm-3">
			    <div class="thumbnail">
<?php echo"<a href='ShowNotes.php?id=".$row['UnitID']."&UnitYear=".$row['UnitYear']."'>"; ?>
			        <img src="squareElement.png" style="width:100%">
			        <div class="caption">
			          <p><?php echo $row['UnitID'] ?></p>
			        </div>
			      </a>
			    </div>
	 </div>



<?php
      array_push($UnitIDInField, $row['UnitID']);
      }
}
?>
</div>
</div>
<p><a style="font-size:8px;color:grey;text-align:center;" href="attributions.php">Image attributions</a></p>
</body>
<?php
require_once("../Header - Footer/footer.html");
?>
</html>
