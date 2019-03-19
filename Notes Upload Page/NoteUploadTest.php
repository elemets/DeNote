<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
<?php
//require_once("../Header - Footer/header.html");
?>
</head>
<body>

     <form method="post" enctype="multipart/form-data" action='test.php'>
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

</body>
<footer>
</footer>
</html>
