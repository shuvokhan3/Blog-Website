<?php

include_once 'c:\newxampp2\xampp\htdocs\blogwebsite\lib\Session.php';
Session::oldUserloginCheck();


include_once 'c:\newxampp2\xampp\htdocs\blogwebsite\lib\Database.php';
include_once 'c:\newxampp2\xampp\htdocs\blogwebsite\helpers\format.php';

class adminLogin
{
  private $db;
  private $fr;
  public function __construct()
  {
    $this->db = new Database();
    $this->fr = new Format();
  }

  public function LoginUser($email, $password)
  {
    $email = $this->fr->validation($email);
    $password = $this->fr->validation($password);

    if(empty($email) || empty($password)) {
      return "Field Is Not Empty!<br>";
    } else {
      // First get the user by email only
      $select = "SELECT * FROM user_registration_info WHERE email = '$email'";
      $result = $this->db->select($select);
      
      if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        
        // Verify the password using password_verify
        if(password_verify($password, $row['password'])) {
          if($row['verifyStatus'] == '1#') {
            Session::set('login', true);
            Session::set('userName', $row['userName']);
            header('location:index.php');
          } else {
            return "Verify Your Email First";
          }
        } else {
          echo "<div class='error-message'>Invalid Email Or Password!</div>";
        }
      } else {
        echo "<div class='error-message'>Invalid Email Or Password!</div>";
      }
    }
  }
}


?>



<!-- For custome styling -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test</title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
</body>
</html>

