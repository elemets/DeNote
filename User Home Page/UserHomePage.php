<!DOCTYPE html>
<html lang="en">
  <?php
    session_start();
    if($_SESSION["username"] == null)
    {
    	header('Location: ../index.html');
    }
    require_once("../Header - Footer/header.php");
    ?>
  <title>Page Title</title>
  <style>
    body {
      padding-top: 50px;
    }
    body > p {
      text-align: center;
    }
    .centered {
      position: absolute;
      top: 50%;
      left: 50%;
      background-color:rgba(0, 0, 0, 0.7);
      padding: 20px;
      transform: translate(-50%, -75%);
      text-align: center;
    }
    .col-sm-3 {
      padding-bottom: 30px;
    }

  </style>

  <body>

    <div id="top" class="container-fluid">

      <div class="row">
        <h1 style="margin-bottom:30px; padding-left: 15px;">Hello, <?php echo $_SESSION["username"]; ?></h1>
      </div>

      <div class="row">
        <?php
          require_once('config.inc.php');
             	// Connect to the database
              	$conn = new PDO("mysql:host=$database_host;dbname=$database_name", $database_user, $database_pass);
              	$conn2 = new mysqli($database_host, $database_user, $database_pass, "2018_comp10120_z3");
          $UnitYear = $conn2->query("SELECT YearOfStudent FROM Users WHERE Username = '$_SESSION[username]'")->fetch_object()->YearOfStudent;//YearOfStudent query
          $stat = $conn->prepare("SELECT * FROM Notes WHERE UnitYear = ?");
            	$stat->bindParam(1, $UnitYear);
            	$stat->execute();
                 $UnitIDInField = array();
          
          while($row = $stat->fetch()){
          if (!in_array($row['UnitID'], $UnitIDInField))
               {
          $img = "Images/" . $row['UnitID'] . ".png";
          ?>
        <div class="col-sm-3 col-xs-6">
          <a <?php echo"<a href='ShowNotes.php?id=".$row['UnitID']."&UnitYear=".$row['UnitYear']."'>"; ?>
          <img src="<?php echo $img ?>" style="width:100%;">
          <div class="centered">
            <h2 style="color: #fff;"><?php echo $row['UnitID'] ?></h2>
          </div>
          </a>
        </div>

        <?php
          array_push($UnitIDInField, $row['UnitID']);
          }
          }
          ?>
      </div>
    </div>

    <p><a style="color:grey;" href="attributions.php">Image attributions</a></p>
  </body>

  <?php
    require_once("../Header - Footer/footer.html");
    ?>

</html>
