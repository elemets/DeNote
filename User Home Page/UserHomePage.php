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

    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="ProfilePageCss.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="mdb.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<?php
$_SESSION["username"] = $_SESSION["username"]
?>
<?php echo $_SESSION["username"]; ?>
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
