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
	<?php
	$_SESSION["username"] = $_SESSION["username"]
	?>

	<h2>Hello <?php echo $_SESSION["username"]; ?></h2>

    <div id="top" class="container-fluid">
			<div class="row">
		<div class="col-sm-3">
			   <span><img src="squareElement.png" style="width:100%"></span>
			   <div class="centered">Centered</div>
	 </div>
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
	$start = '<div class="col-sm-3"><span><img src="squareElement.png" style="width:100%" href="';
	$middle = '"></span><div class="centered">';
	$end = '</div></div>';

	while($row = $stat->fetch()){
	if (!in_array($row['UnitID'], $UnitIDInField))
      {
      echo "<li><a href='ShowNotes.php?id=".$row['UnitID']."&UnitYear=".$row['UnitYear']."'>".$row['UnitID']."</a></li>";
			$href = "ShowNotes.php?id=".$row['UnitID']."&UnitYear=".$row['UnitYear'];
			$section = $row['UnitID'];
			//echo "$start.$href.$middle.$section.$end";
?>
 <?php
echo "      <a href= 'ShowNotes.php?id=".$row['UnitID']."&UnitYear=".$row['UnitYear']."'>
          <div id="top" class="container-fluid">
            <div class="row">
	      <div class="col-sm-3">
	        <span><img src="squareElement.png" style="width:100%"></span>
	          <div class="centered"><?php echo $row['UnitID']?></div>
	      </div>
	    </div>
      
      </a>";
?>
<?php
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
