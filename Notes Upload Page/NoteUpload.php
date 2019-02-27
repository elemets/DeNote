<?php
session_start();
?>
<!DOCTYPE html>
<html>


    <title>Upload Page</title>

<?php
include "../Header - Footer/header.php";
?>
<style>
    body {
        background-color: white !important;
    }
    .top-buffer {
        margin-top:20px !important;
    }
    .bottom-buffer {
        margin-bottom:20px !important;
    }
    .submit-btn {
        background-color: #660099 !important;
    }
    .submit-font {
        color:#ffffff !important;
    }
    .submit-font:hover {
        color:#ecaa33 !important;
    }
    .multi-form-wrapper{
        margin-bottom: 20px !important;
    }
    .form-element{
        display: inline !important;
        width:100% !important;
    }
    .form-top-right{
        width : 25% !important;
        font-size: 66px !important;
    }
    .form-top-left{
        width : 75% !important;
    }
    .navbar {
        background-color: #660099 !important;
    }
    .formcenter {
        min-height: 100% !important;  /* Fallback for browsers do NOT support vh unit */
        min-height: 100vh; /* These two lines are counted as one :-)       */
        align-items: center !important;
    }
</style>
<body>
<div>
<?php
require_once('config.inc.php');
// Connect to the database
 $conn = new PDO("mysql:host=$database_host;dbname=$database_name", $database_user, $database_pass);
 $conn2 = new mysqli($database_host, $database_user, $database_pass, "2018_comp10120_z3");

 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(isset($_POST['btn']))
{

  $userID = $conn2->query("SELECT UserID FROM Users WHERE Username ='$_SESSION[username]'")->fetch_object()->UserID;
  $unitYear = $conn2->query("SELECT YearOfStudent FROM Users WHERE Username ='$_SESSION[username]'")->fetch_object()->YearOfStudent;
  $name = $_FILES['requiredFile']['name'];
  $type = $_FILES['requiredFile']['type'];
  $titleNote = $_POST["title"];
  $unitID = $_POST["UnitID"];
  $sectionNumber = $_POST["sectionNumber"];

  if(validateUpload($unitID, $sectionNumber))
  {
  $data = file_get_contents($_FILES['requiredFile']['tmp_name']);
  $stmt = $conn->prepare("INSERT INTO Notes (`FileName`,`dataType`,`Data`, `SectionNumber`, `UserID`, `UnitID`, `TitleNote`, `UnitYear`) VALUES (?,?,?,?,?,?,?,?)");
  $stmt->bindParam(1, $name);
  $stmt->bindParam(2, $type);
  $stmt->bindParam(3, $data);
  $stmt->bindParam(4, $sectionNumber);
  $stmt->bindParam(5, $userID);
  $stmt->bindParam(6, $unitID);
  $stmt->bindParam(7, $titleNote);
  $stmt->bindParam(8, $unitYear);
  $stmt->execute();
  }
  else
    echo "empty field of section number or unit is ---- or number is string";
  }
?>
<div class="container formcenter">
            <div class="form-content">
                <div class="form-top-left">
                    <h2>Upload</h2>
                </div>

   <div class="form-body">
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

            </select>
                    </div>

                    <div class="form-group">
                        <label for="sectionID"> Section ID</label>
                        <input type="textbox" class="form-control form-element" name="sectionNumber" placeholder="Section ID">
                    </div>

                    <div class="form-group">
                            <input type="file" name="requiredFile" accept=".pdf,.png,.jpg">
                    </div>

                    <br>
                    <div class="form-group">
                    <input type="submit" class="btn btn-default btn-lg submit-btn btn-block submit-font bottom-buffer" value="Submit" name="btn">
                  </div>
                </form>
            </div>
          </div>
      </div>

<?php
    function validateUpload($Unit, $Number)
    {
      if ($Unit == "----")
        return false;
      else if ($Number == "")
        return false;
     // else if(is_string($Number))
       // return false;
      else
        return true;
    }
     ?>

</div>
</body>

<?php
require_once("../Header - Footer/footer.html");
?>
</html>
