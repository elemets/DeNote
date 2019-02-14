<?php
include 'global.php';

$code = $_GET['code'];

if(!$code)
  echo "no code supplied";
else {
  $check = mysql_query("SELECT * FROM Users WHERE code='$code' AND active='1'");
  if(mysql_num_rows($check)==1)
    echo "you allready activated!";
  else {
    $activate = mysql_query("UPDATE Users SET active='1' WHERE code='$code'");
    echo"your account has been activated.";
  }

}
 ?>
