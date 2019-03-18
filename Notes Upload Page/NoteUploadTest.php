
<?php
require_once('tcpdf_include.php');
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

     $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    if(isset($_POST['btn'])){
      foreach ($_FILES['requiredFiles']['name'] as $key => $value) {
        $pdf->AddPage();
        $fileName = basename($_FILES['requiredFiles']['name'][$key]);
        $pdf->Image($fileName, 15, 140, 75, 113, 'JPG', 'http://www.tcpdf.org', '', true, 150, '', false, false, 1, false, false, true);
      }
      $pdf->Output('example_009.pdf', 'I');

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
