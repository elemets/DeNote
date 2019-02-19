<?php
session_start();
require_once('config.inc.php');
$conn = new PDO("mysql:host=$database_host;dbname=$database_name", $database_user, $database_pass);
$conn2 = new mysqli($database_host, $database_user, $database_pass, "2018_comp10120_z3");
echo $_SESSION[username];
$userID = $conn2->query("SELECT UserID FROM Users WHERE Username ='$_SESSION[username]'")->fetch_object()->UserID;
echo $userID;
$stat = $conn->prepare("SELECT * FROM Notes WHERE UserID = ?");
$stat->bindParam(1, $userID);
$stat->execute();

header('Content-Type:'.$row['dataType']);
echo $row['Data'];
 ?>
