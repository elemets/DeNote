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
<?php echo "welcome " + $_SESSION["username"]; ?>
	<div class="jumbotron Container-fluid">
          <img src="Icons/Notes_Icons/PurpleNoHover.png" class="hoverable">
          <div class="centered">COMP16212</div>
          <img src="Icons/Notes_Icons/PurpleNoHover.png" class="hoverable">
          <div class="">COMP1020</div>
        </div>
</body>
<footer>
<?php
require_once("../Header - Footer/footer.html");
?>
</footer>
</html>
