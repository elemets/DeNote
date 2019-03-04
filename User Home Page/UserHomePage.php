<?php
session_start();
?>
<?php
require_once("../Header - Footer/header.php");
?>
<title>Page Title</title>
<style>
body > p {
	padding-top: 50px;
}
p {
	text-align: center;
}
.container {
  position: relative;
  text-align: center;
  color: white;
}
@media screen and (max-width: 768px) {
  .col-sm-4 {
    text-align: center;
    margin: 25px 0;
  }
  .btn-lg {
    width: 100%;
    margin-bottom: 35px;
  }
}
</style>

<body>
	<?php
	$_SESSION["username"] = $_SESSION["username"]
	?>
  <div id="top" class="container-fluid">
	  <div class="row">
	<h2>Hello <?php echo $_SESSION["username"]; ?></h2>
</div>
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
?>

			<div class="row">
<?php
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
</body>
<?php
require_once("../Header - Footer/footer.html");
?>
</html>
