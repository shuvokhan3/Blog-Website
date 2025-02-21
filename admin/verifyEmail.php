<?php
//include session 
include_once 'c:\newxampp2\xampp\htdocs\blogwebsite\lib\Session.php';
Session::init();

//include database.php here
include_once 'c:\newxampp2\xampp\htdocs\blogwebsite\lib\Database.php';

class EmailVerification {
    public $db;

    public function __construct() {
        $this->db = new Database();
    }

    //verifyUserEmail class use to verify user
    public function verifyUserEmail($token) {
    
        //run a query on my database a take verifToken on my inside $result varibale
        $query = "SELECT verifyToken, verifyStatus FROM user_registration_info WHERE verifyToken = '$token'";
        $result = $this->db->select($query);


        //if result is full of token
        if ($result) {
            //Take this row
            $row = mysqli_fetch_assoc($result);
            
            //if $row array verifStatus index is 0 
            if ($row['verifyStatus'] == '0') {

                // Use the token from URL and update the database field value is 1#;
                $updateStatus = "UPDATE user_registration_info SET verifyStatus = '1#' WHERE verifyToken = '$token'";
                $updateResult = $this->db->update($updateStatus);
                
                //if updateResult is full of data
                if ($updateResult) {
                    $_SESSION['status'] = "Your Account Has been Verified Successfully";
                } else {
                    $_SESSION['status'] = "Verification Failed!!";
                }
            } else {
                $_SESSION['status'] = "This Email Already verified!";
            }
        } else {
            $_SESSION['status'] = "This token Does Not Exist!";
        }
        
        header('location:login.php');
        exit();
    }
}

// Main execution
if (isset($_GET['token'])) {
    $verifier = new EmailVerification();
    $verifier->verifyUserEmail($_GET['token']);
} else {
    $_SESSION['status'] = "Not Allowed!";
    header('location:login.php');
    exit();
}