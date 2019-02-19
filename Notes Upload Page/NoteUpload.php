<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
<?php
//require_once("../Header - Footer/header.html");
?>
</head>
<body>
    <?php
    require_once('config.inc.php');
    // Connect to the database
    $conn = new mysqli($database_host, $database_user, $database_pass, "2018_comp10120_z3");
    // Check for errors before doing anything else
    if($conn -> connect_error)
      die('Connect Error ('.$mysqli -> connect_errno.') '.$mysqli -> connect_error);

    if(isset($_POST['btn'])){
      $name = $_FILES['requiredFile']['name'];
      $type = $_FILES['requiredFile']['type'];
      $data = file_get_contents($_FILES['requiredFile']['tmp_name']);
      $stmt = $dbh->prepare("INSERT INTO `Notes`(`FileName`, `dataType`, `Data`) VALUES (?,?,?)");
      $stmt->bindParam(1, $name);
      $stmt->bindParam(2, $type);
      $stmt->bindParam(3, $data);
      $stmt->execute();
    }


     ?>


    <form method="post" enctype="multipart/form-data">
      <label for="sectionID"> Section:</label>
      <input type="textbox" name="sectionID"/>
      <label for="uploadedFile"> Choose file:</label>
      <input type="file" name="requiredFile"/>
      <button name="btn"> Upload </button>
    </form>
</body>
<footer>
<?php
require_once("../Header - Footer/footer.html");
?>
</footer>
</html>
