<?php
require_once('../Notes Upload Page/tcpdf/examples/tcpdf_include.php');
require_once('../Notes Upload Page/tcpdf/tcpdf.php');
session_start();
require_once('config.inc.php');
// Connect to the database
 $conn = new PDO("mysql:host=$database_host;dbname=$database_name", $database_user, $database_pass);
 $conn2 = new mysqli($database_host, $database_user, $database_pass, "2018_comp10120_z3");

 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
if(isset($_POST['btn'])){
    foreach($_FILES['requiredFiles']['name'] as $key=>$val){
    $data = file_get_contents($_FILES['requiredFiles']['tmp_name'][$key]);
    $pdf->AddPage();
    $pdf->Image('@'.$data);
  }
}

  $pdf->Output('example_009.pdf', 'F');
  $data = file_get_contents('example_009.pdf');
  $type = filetype ('example_009.pdf');
  $stmt = $conn->prepare("INSERT INTO Notes (`FileName`,`dataType`,`Data`, `SectionNumber`, `UserID`, `UnitID`, `TitleNote`) VALUES (?,?,?,?,?,?,?)");
  $stmt->bindParam(1, 'example_009');
  $stmt->bindParam(2, $type);
  $stmt->bindParam(3, $data);
  $stmt->bindParam(4, '321');
  $stmt->bindParam(5, '127');
  $stmt->bindParam(6, 'COMP');
  $stmt->bindParam(7, 'alabala');
  $stmt->execute();
 ?>
