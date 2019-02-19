<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
<?php
//require_once("../Header - Footer/header.html");
?>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
      <label for="sectionID"> Section:</label>
      <input type="textbox" name="sectionID"/>
      <label for="uploadedFile"> Choose file:</label>
      <input type="file" name="reqiredFile"/>
      <button name="btn"> Submit </button>
    </form>



</body>
<footer>
<?php
require_once("../Header - Footer/footer.html");
?>
</footer>
</html>
