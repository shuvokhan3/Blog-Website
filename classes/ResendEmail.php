<?php

   //i need database 
   include_once 'c:\newxampp2\xampp\htdocs\blogwebsite\lib\Database.php';
   include_once 'c:\newxampp2\xampp\htdocs\blogwebsite\helpers\format.php';
   include_once 'c:\newxampp2\xampp\htdocs\blogwebsite\lib\mail.php';
   
   class ResendEmail{  
    private $db;
    private $fr;
    public function __construct(){
        $this->db = new Database();
        $this->fr = new Format();
    }
    public function resendEmail($email)   {


        
        
        $email = $this->fr->validation($email);
        $email = mysqli_real_escape_string($this->db->linkWithDatabase, $email );

        //if user try to verfy using empty form
        if(empty($email)){
            return "Field Must Be FullFill!!";
        }else{

            //check that email is exist in database or not
            $checkEmail = "SELECT * FROM user_registration_info WHERE email='$email'";
            $emailResult = $this->db->select($checkEmail);


            if(mysqli_num_rows($emailResult) > 0){
                $row = mysqli_fetch_assoc($emailResult);

                if($row['verifyStatus'] != '1#'){
                    $name = $row['userName'];
                    $email = $row['email'];
                    $verifyToken = $row['verifyToken'];


                    // resendEmailVerify($name,$email,$verifyToken);

                    //sending mail to user using mail object inside sendMailTOUser method
                    $mail = new mail();
                    $mail->sendMailToUser($name,$email,$verifyToken);

                    $success = "Varification Email Link Has Bee";
                }else{
                    return "Email already varified please login";
                }
            }else{
                return "Email is not register please register first";
            }
        }
    }
   }
?>