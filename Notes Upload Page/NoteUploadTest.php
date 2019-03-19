<?php
require_once('../Notes Upload Page/tcpdf/examples/tcpdf_include.php');
require_once('../Notes Upload Page/tcpdf/tcpdf.php');
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
        $data = file_get_contents($_FILES['requiredFile']['tmp_name']);
        $pdf->AddPage();
        echo $data;
        $pdf->Image('@'.$data);
      }
      $pdf->Output('example_009.pdf', 'I');
     ?>
     <form method="post" enctype="multipart/form-data">
       <div class="form-group">
         <label for="title"> Note Name</label>
         <input type="textbox" class="form-control" name="title" placeholder="Title">
       </div>
       <div class="form-group">
         <label for="unit"> Unit</label>
         <select class="form-control" name="UnitID" placeholder="Unit">
           <option>----</option>
           <option>AHCP</option>
           <option>AMER</option>
           <option>ARGY</option>
           <option>BIOL</option>
           <option>BMAN</option>
      
         </select>
       </div>
       <div class="form-group">
         <label for="sectionID"> Section ID</label>
         <input type="textbox" class="form-control form-element" name="sectionNumber" placeholder="Section ID">
       </div>
       <div id="file-id" class="form-group">
         <input type="file" id="requiredFile" name="requiredFile" accept=".pdf,.png,.jpg">
       </div>
       <div class="form-group">
         <input type="checkbox" name="box" value="tik the Box"> I confirm that the file complies with the <a href="./TermsAndConditions.html">Terms and Conditions</a><br>
       </div>
       <div class="form-group">
         <input type="submit" class="btn btn-default btn-lg submit-btn btn-block submit-font bottom-buffer" value="Submit" name="btn">
       </div>
     </form>

    <?php
    $stat = $conn->prepare("SELECT * FROM `Notes`");
    $stat->execute();
     ?>

</body>
<footer>
</footer>
</html>
