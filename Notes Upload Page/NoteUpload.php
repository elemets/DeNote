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
     $conn2 = new mysqli($database_host, $database_user, $database_pass, "2018_comp10120_z3");

     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_POST['btn'])){
      $userID = $conn2->query("SELECT UserID FROM Users WHERE Username ='$_SESSION[username]'")->fetch_object()->UserID;
      $name = $_FILES['requiredFile']['name'];
      $type = $_FILES['requiredFile']['type'];
      $data = file_get_contents($_FILES['requiredFile']['tmp_name']);
      $sectionName = $_POST["sectionName"];
      $parentID = $_POST["courses"];
      $stmt = $conn->prepare("INSERT INTO Notes (`FileName`,`dataType`,`Data`, `SectionName`, `UserID`, `ParentID`) VALUES (?, ?, ?,?, ?,?)");
      $stmt->bindParam(1, $name);
      $stmt->bindParam(2, $type);
      $stmt->bindParam(3, $data);
      $stmt->bindParam(4, $sectionName);
      $stmt->bindParam(5, $userID);
      $stmt->bindParam(6, $parentID);
      $stmt->execute();
    }
     ?>
    <form method="post" enctype="multipart/form-data">
       <label for="Unit"> Unit:</label>
      <select name="courses" placeholder="parentID">
              <option>----</option>
              <option>AHCP</option>
              <option>AMER</option>
              <option>ARGY</option>
              <option>BIOL</option>
              <option>BMAN</option>
              <option>CHEM</option>
              <option>CHEN</option>
              <option>CHIN</option>
              <option>CLAH</option>
              <option>COMP</option>
              <option>DENT</option>
              <option>DRAM</option>
              <option>EART</option>
              <option>ECON</option>
              <option>EDUC</option>
              <option>EEEN</option>
              <option>ENGL</option>
              <option>FOUN</option>
              <option>FREN</option>
              <option>GEOG</option>
              <option>GERM</option>
              <option>HCDI</option>
              <option>HIST</option>
              <option>HSTM</option>
              <option>IIDS</option>
              <option>ITAL</option>
              <option>JAPA</option>
              <option>LAWS</option>
              <option>LELA</option>
              <option>MACE</option>
              <option>MATH</option>
              <option>MATS</option>
              <option>MCEL</option>
              <option>MEDN</option>
              <option>MEST</option>
              <option>MGDI</option>
              <option>MUSC</option>
              <option>NURS</option>
              <option>OPTO</option>
              <option>PHAR</option>
              <option>PHIL</option>
              <option>PHYS</option>
              <option>PLAN</option>
              <option>POLI</option>
              <option>PSYC</option>
              <option>RELT</option>
              <option>RUSS</option>
              <option>SALC</option>
              <option>SOAN</option>
              <option>SOCY</option>
              <option>SOST</option>
              <option>SPLA</option>
              <option>UCIL</option>
              <option>Other</option>
      </select>
      <label for="sectionID"> Number:</label>
      <input type="textbox" name="sectionName"/>
      <label for="uploadedFile"> Choose file:</label>
      <input type="file" name="requiredFile" accept=".pdf,.png,.jpg"/>
      <button name="btn"> Upload </button>
    </form>

    <?php
    //$stat = $conn->prepare("SELECT * FROM `Notes`");
    //$stat->execute();


     ?>

</body>
<footer>
</footer>
</html>
