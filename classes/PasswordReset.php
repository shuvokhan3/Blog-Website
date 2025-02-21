<?php
  include_once 'c:\newxampp2\xampp\htdocs\blogwebsite\lib\Database.php';
  include_once 'c:\newxampp2\xampp\htdocs\blogwebsite\helpers\format.php';
  include_once 'c:\newxampp2\xampp\htdocs\blogwebsite\lib\sendMailForPasswordReset.php';


  class PasswordReset{
    private $db;
    private $fr;

    public function __construct(){
        $this->db = new Database();
        $this->fr = new Format();
    }

    public function passwordReset($email){

    

      $email = $this->fr->validation($email);
      //generate a random varification token;
      $v_token = md5(rand());

      if(empty($email)){
        echo "Field must not be empty!!";
        
      }else{

        $check_email = "SELECT * FROM user_registration_info
        WHERE email = '$email'";
        $email_result = $this->db->select($check_email);

        if(mysqli_num_rows($email_result) > 0){
          $row = mysqli_fetch_assoc($email_result);
          $name = $row['userName'];
          $email = $row['email'];

          $query = "UPDATE user_registration_info
          SET verifyToken='$v_token'
          WHERE email = '$email' 
          LIMIT  1 ";

          $updateToken = $this->db->update($query);

          if($updateToken){
            // sendPasswordReset($name, $email, $v_token);

            $sendEmail = new SendMailForPasswordReset();

            $sendEmail -> sendMailToUser($name,$email, $v_token);

            echo "Check in your Gmail";
          }else{
            echo "Token is not update!!";
          }

        }else{
          echo "Email Not Found!!";
        }
      }

    }


  }

;
?>
