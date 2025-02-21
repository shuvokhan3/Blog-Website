<?php
//include database on this file
include_once 'c:\newxampp2\xampp\htdocs\blogwebsite\lib\Database.php';
include_once 'c:\newxampp2\xampp\htdocs\blogwebsite\helpers\format.php';
include_once 'c:\newxampp2\xampp\htdocs\blogwebsite\lib\mail.php';

//the register class haldle all the functionality of the registration process
class Register
{
   public $db;
   public $fr;
   //constructor function is use because when this register object is create this time at first this constructor function is able to called.In this function i create two object of the two class.
   public function __construct()
   {
      $this->db = new Database(); //This object is use to check connection and run query of the database\
      //this object is use to reformate user data.
      $this->fr = new Format();
   }


   //AddUser class add all userinformation in database and check validation an send mail in user index.
   public function AddUser($data) {
      // Sanitize inputs
      $fullName = filter_var($this->fr->validation($data['name']), FILTER_SANITIZE_STRING);
      $phoneNumber = filter_var($this->fr->validation($data['number']), FILTER_SANITIZE_STRING);
      $email = filter_var($this->fr->validation($data['email']), FILTER_SANITIZE_EMAIL);
      
      $password = $this->fr->validation($data['password']);
      // Hash the password before storing
      $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
      $verifyToken = bin2hex(random_bytes(32));
  
      //field is empty
      if (empty($fullName) || empty($phoneNumber) || empty($email) || empty($password)) {
          return "Field Must Not be empty";
      }
  
     // Prepare statement for email check
     $stmt = mysqli_prepare($this->db->linkWithDatabase, "SELECT email FROM user_registration_info WHERE email = ?");
     if (!$stmt) {
         return "Failed to prepare statement";
     }
     mysqli_stmt_bind_param($stmt, "s", $email);
     mysqli_stmt_execute($stmt);
     mysqli_stmt_store_result($stmt);

     // Check if the email already exists
     if (mysqli_stmt_num_rows($stmt) > 0) {
         mysqli_stmt_close($stmt);
         return "Email already used";
     }

     $verifyStatus = '0';
     // Prepare insert statement
     $insertStmt = mysqli_prepare($this->db->linkWithDatabase, 
         "INSERT INTO user_registration_info(userName, email, phoneNumber, password, verifyToken,verifyStatus) 
          VALUES (?, ?, ?, ?, ?, ?)");

     if (!$insertStmt) {
         return "Failed to prepare insert statement";
     }

     
     mysqli_stmt_bind_param($insertStmt, "ssssss", 
         $fullName, $email, $phoneNumber, $hashedPassword, $verifyToken,$verifyStatus);

     if (mysqli_stmt_execute($insertStmt)) {
         $sendMailVarification = new mail();
         $sendMailVarification->sendMailToUser('Shuvo', $email, $verifyToken);
         return "Registration Success, Please check your email inbox for verify email";
     }

     return "Registration Failed";
 }

}
