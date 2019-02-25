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
    require_once('config.inc.php');
    // Connect to the database
     $conn = new PDO("mysql:host=$database_host;dbname=$database_name", $database_user, $database_pass);
     $conn2 = new mysqli($database_host, $database_user, $database_pass, "2018_comp10120_z3");

     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_POST['btn']))
    {

      $userID = $conn2->query("SELECT UserID FROM Users WHERE Username ='$_SESSION[username]'")->fetch_object()->UserID;
      $name = $_FILES['requiredFile']['name'];
      $type = $_FILES['requiredFile']['type'];
      $titleNote = $_POST["title"];
      $unitID = $_POST["UnitID"];
      $sectionNumber = $_POST["sectionNumber"];

      echo $titleNote;
      echo $sectionNumber;
      if(validateUpload($unitID, $sectionNumber))
      {
      $data = file_get_contents($_FILES['requiredFile']['tmp_name']);
      $stmt = $conn->prepare("INSERT INTO Notes (`FileName`,`dataType`,`Data`, `SectionNumber`, `UserID`, `UnitID`, `TitleNote`) VALUES (?,?,?,?,?,?,?)");
      $stmt->bindParam(1, $name);
      $stmt->bindParam(2, $type);
      $stmt->bindParam(3, $data);
      $stmt->bindParam(4, $sectionNumber);
      $stmt->bindParam(5, $userID);
      $stmt->bindParam(6, $unitID);
      $stmt->bindParam(7, $titleNote);
      $stmt->execute();
      }
      else
        echo "empty field of section number or unit is ---- or number is string";
    }

     ?>
        <div class="container formcenter">
            <div class="col-sm">
                <div class="form-content">
                    <div class="form-top-left">
                        <h2>Uplopad</h2>
                    </div>
                    <form method="post" action="<?php $_SERVER["PHP_SELF"]; ?>">
                        <div class="form-group">
                            <label for="title"> Note Name</label>
                            <input type="textbox" class="form-control form-element" name="title" placeholder="Title">
                        </div>


                        <div class="form-group">
                            <label for="unit"> Unit</label>
                            <select class="form-control form-element" name="UnitID" placeholder="Unit">
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
                        </div>

                        <div class="form-group">
                            <label for="sectionID"> Section ID</label>
                            <input type="textbox" class="form-control form-element" name="sectionNumber" placeholder="Section ID">
                        </div>

                        <div class="form-group">
                            <label for="requiredFile"> Choose File</label>
                            <input type="file" name="requiredFile" accept=".pdf,.png,.jpg" />
                        </div>

                        <br>
                        <button type="submit" class="btn btn-default btn-lg submit-btn btn-block submit-font bottom-buffer" value="Submit" name="btn">
                    </form>

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

</body>
<?php
require_once("../Header - Footer/footer.html");
?>

    <style>
        body {
            background-color: white;
        }
        .top-buffer {
            margin-top:20px;
        }
        .bottom-buffer {
            margin-bottom:20px;
        }
        .submit-btn {
            background-color: #660099;
        }
        .submit-font {
            color:#ffffff;
        }
        .submit-font:hover {
            color:#ecaa33;
        }
        .multi-form-wrapper{
            margin-bottom: 20px;
        }
        .form-element{
            display: inline;
            width:100%;
        }
        .form-top-right{
            width : 25%;
            font-size: 66px;
        }
        .form-top-left{
            width : 75%;
        }
        .navbar {
            background-color: #660099;
        }
        .formcenter {
            min-height: 100%;  /* Fallback for browsers do NOT support vh unit */
            min-height: 100vh; /* These two lines are counted as one :-)       */
            width: auto;
            display: flex;
            align-items: center;
        }
    </style>

</html>
