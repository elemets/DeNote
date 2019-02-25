<?php
session_start();
require_once('config.inc.php');
$conn = new PDO("mysql:host=$database_host;dbname=$database_name", $database_user, $database_pass);
$id = isset($_GET['id'])? $_GET['id'] : "";
$stat = $conn->prepare("SELECT * FROM Notes WHERE UnitID = ?");
$stat->bindParam(1, $id);
$stat->execute();

while($row = $stat->fetch()){
      echo "<li><a target='_blank' href='view.php?id=".$row['NoteID']."'>".$row['FileName']."</a></li>";
    }

 ?>
