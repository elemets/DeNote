<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
<?php
require_once("../Header - Footer/header.php");
?>
</head>
<body>
<?php
session_start();
require_once('config.inc.php');
$conn = new PDO("mysql:host=$database_host;dbname=$database_name", $database_user, $database_pass);
$id = isset($_GET['id'])? $_GET['id'] : "";
$stat = $conn->prepare("SELECT * FROM Notes WHERE NoteID = ?");
$stat->bindParam(1, $id);
$stat->execute();

$row = $stat->fetch();
$URL = new URL(URL.createObjectURL($row['Data']));
?>

<iframe id="iframepdf" src= "<?php $URL ?>"></iframe>

</body>
<footer>
<?php
require_once("../Header - Footer/footer.html");
?>
</footer>
</html>
