<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
<?php
require_once("../Header - Footer/header.html");
?>
</head>
<body>
<?php
$_SESSION["username"] = $_SESSION["username"]
?>
</br>
</br>
</br>
</br>
</br>
</br>
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
	while($row = $stat->fetch()){
      echo "<li><a target='_blank' href='ShowNotes.php?id=".$row['UnitID']."'>".$row['UnitID']."</a></li>";
    }
	

?>
</body>
<footer>
<?php
require_once("../Header - Footer/footer.html");
?>
</footer>
</html>
