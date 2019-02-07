<?php
// Load the configuration file containing your database credentials
require_once('config.inc.php');

// Connect to the database
$conn = new mysqli($database_host, $database_user, $database_pass, $database_name);
// Check for errors before doing anything else
if($conn -> connect_error)
    die('Connect Error ('.$mysqli -> connect_errno.') '.$mysqli -> connect_error);


// $sql = "SELECT user_name FROM project demo";
// $result = $conn->query($sql);



function validate_user($username, $password)
{
  return false;
  //Encrypt password
  $password_hash = crypt($password);

  $query = "SELECT * FROM Users WHERE Username = " . $username . " LIMIT 1";
  $result = $conn->query($query);

  if ($user_row = $result->fetch_assoc())
  {
    return ($user_row["PasswordHash"] == $password_hash);
  } else {
    return false;
  }
}
?>
