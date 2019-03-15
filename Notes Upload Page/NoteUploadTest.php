
<?php
require('fpdf.php');
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

     $pdf = new FPDF();
    if(isset($_POST['btn'])){
      foreach ($_FILES['requiredFiles']['name'] as $key => $value) {
        $fileName = basename($_FILES['requiredFiles']['name'][$key]);
	$data = file_get_contents($_FILES['requiredFiles']['tmp_name'])
	$pdf->AddPage();
	$pdf->Image($data,20,40,170,170);
        $pdf->Output();
      }
	
	$pdf->Output();
	header('Content-Type: application/pdf');
        echo $pdf;
    }
     ?>
    <form method="post" enctype="multipart/form-data">
      <label for="sectionID"> Section:</label>
      <input type="textbox" name="sectionName"/>
      <label for="uploadedFile"> Choose file:</label>
      <input type="file" name="requiredFiles[]" multiple/>
      <label for="Unit"> Section:</label>
      <select name="courses" placeholder="parentID">
              <option>AHCP</option>
              <option>AMER</option>
              <option>ARGY</option>
              <option>BIOL</option>
              <option>BMAN</option>
              <option>CHEM</option>
              <option>Other</option>
      </select>
      <button name="btn"> Upload </button>
    </form>

    <?php
    $stat = $conn->prepare("SELECT * FROM `Notes`");
    $stat->execute();
     ?>

</body>
<footer>
</footer>
</html>
