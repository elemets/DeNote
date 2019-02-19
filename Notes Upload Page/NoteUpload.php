<?php
session_start();
?>
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
     $conn = new PDO("mysql:host=$database_host;dbname=$database_name", $database_user, $database_pass);

     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_POST['btn'])){
      $userID = $conn->query("SELECT UserID FROM Users WHERE UserName = `$_SESSION["username"]`");
      $name = $_FILES['requiredFile']['name'];
      $type = $_FILES['requiredFile']['type'];
      $data = file_get_contents($_FILES['requiredFile']['tmp_name']);
      $sectionId = $_POST["sectionID"];
      $stmt = $conn->prepare("INSERT INTO Notes (`FileName`,`dataType`,`Data`, `SectionID`, `UserID`) VALUES (?, ?, ?,?, ?)");
      $stmt->bindParam(1, $name);
      $stmt->bindParam(2, $type);
      $stmt->bindParam(3, $data);
      $stmt->bindParam(4, $sectionId);
      $stmt->bindParam(5, $userID);
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

    <?php
    $stat = $conn->prepare("SELECT * FROM `Notes`");
    $stat->execute();
    while ($row = $stat->fetch()){
      echo "<li>".$row['FileName']."</li>";
    }
   echo $_SESSION['username'];

     ?>

</body>
<footer>
</footer>
</html>
