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
.container {
  position: relative;
  text-align: center;
  color: white;
}
.centered {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
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
    <div id="top" class="container-fluid row">
		<div class="col-sm-3">
     <div class="container">
			   <span><img src="squareElement.png" style="width:100%;"></span>
			   <div class="centered">Centered</div>
     </div>
	  </div>
		<div class="col-sm-3 Team-Center-Right">
			<span><img src="../Welcome Page/Team Images/Abdullah.png" class="Team-Icon" alt="Abdullah image"></span>
			<h4>ABDULLAH ALI</h4>
			<p>"Lorem Ipsum is simply dummy text of the printing and typesetting industry"</p>
			<br>
		</div>
<?php
$_SESSION["username"] = $_SESSION["username"]
?>
<h2>Hello <?php echo $_SESSION["username"]; ?></h2>
<?php echo $_SESSION["username"]."</br>"; ?>
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
      echo "<li><a href='ShowNotes.php?id=".$row['UnitID']."&UnitYear=".$row['UnitYear']."'>".$row['UnitID']."</a></li>";
      array_push($UnitIDInField, $row['UnitID']);
      }
}
?>
</div>
</body>
<?php
require_once("../Header - Footer/footer.html");
?>
</html>
