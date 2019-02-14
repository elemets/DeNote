<?php
// Load the configuration file containing your database credentials
require_once('config.inc.php');

// Connect to the database
$conn = new mysqli($database_host, $database_user, $database_pass, "2018_comp10120_z3");
// Check for errors before doing anything else
if($conn -> connect_error)
    die('Connect Error ('.$mysqli -> connect_errno.') '.$mysqli -> connect_error);





function validate_user($username, $password)
{
  global $conn;
  //return false;// uses for testing perposes
  //Encrypt password
  $password_hash = crypt($password, $username);

  $query = "SELECT * FROM Users WHERE Username = '$username' LIMIT 1";
  $result = $conn->query($query);

  if ($result && $user_row = $result->fetch_assoc())
  {
    $login = mysql_query("SELECT * FROM Users WHERE Username = '$username'");
    if(mysql_num_rows($login)==0)
      return false;
    else{
      while($login_row = mysql_fetch_assoc($login))
      {
        //get pass
        $password_db = $login_row['password'];

        if($password_hash!=$password_db)
          {echo "incorrect pass";
          return false;}
        else {
          $active = $login_row['active'];
          $email = $login_row['Email'];
          if($active==0)
          {
            echo "not activated yet please active via $email";
            return false;
          }
          else {
            return true;
          }
        }

      }
    }
  }
  //   return ($user_row["PasswordHash"] == $password_hash);
  // } else {
  //   return false;
  }
}
//var_dump(validate_user("1234", "Helo"));// ? "Login\n" : "No\n";


function register($username, $password, $email)
{
    global $conn;
    $query = "SELECT * FROM Users WHERE Username = '$username' LIMIT 1";
    $result = $conn->query($query);


    if ($result->num_rows > 0) return false;

    $query = "SELECT * FROM Users WHERE Email = '$email' LIMIT 1";
    $result = $conn->query($query);
    if ($result->num_rows > 0) return false;

    $password_hash = crypt($password, $username);
    // $query = "INSERT INTO `Users`(`Email`, `Username`, `PasswordHash`) VALUES ('$email', '$username', '$password_hash')";
    // $result = $conn->query($query);
    //
    // if ($result) {
    //   //genarate code
      $code = rand(1111111111, 9999999999);

      //send activation message
      $to = $email;
      $subject = "Activate your account";
      $headers = "From: DENOTES@activation.com";
      $body = "Hello $username, \n\nYou regeisterd and need to activate your account. Click the link below\n\nhttps://web.cs.manchester.ac.uk/a64508sa/Z3_Y1_Project/SignIn SignUp/activate.php?code=$code\n\nThanks"
      if (!mail($to,$subject,$body,$headers))
        return false;
      else {
        $register = mysql_query("INSERT INTO `Users` VALUES ('',$email', '$username', '$password_hash','$code','0','','','')");
        echo "you have been registered succefuly please check yoir email $email to activate your account."
      }
      return true;
    } else {
      // SQL Error
      return false;
    // }

}

//var_dump(register("tt7532436", "bgdht", "sda@236te23asd214231st.test"));
//var_dump(validate_user("sd121", "bgdht"));
//var_dump(validate_user("sd12", "bgdht"));
?>
