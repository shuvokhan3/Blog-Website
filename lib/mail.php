<?php


//Include for sending main
include_once 'c:\newxampp2\xampp\htdocs\blogwebsite\phpmailer\PHPMailer.php';
include_once 'c:\newxampp2\xampp\htdocs\blogwebsite\phpmailer\SMTP.php';
include_once 'c:\newxampp2\xampp\htdocs\blogwebsite\phpmailer\Exception.php';
include_once 'c:\newxampp2\xampp\htdocs\blogwebsite\classes\register.php';

//used for sending mail
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class mail
{
    //add verify Token


    public function sendMailToUser($fullName,$email,$verifyToken) {
        
        $mail = new PHPMailer(true);
        $mail->isSMTP();   
        $mail->SMTPAuth   = true; 
        

        $mail->Host       = 'smtp.gmail.com';
        $mail->Username   = 'shuvoj360@gmail.com'; 
        $mail->Password   = 'iwsd cmbn fske gglz'; 
        
        
        $mail->SMTPSecure = 'tls'; //TLS
        $mail->Port       = 587;  //or 465 

        //Debugging SMTP connection
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;


        $mail->setFrom('shuvoj360@gmail.com', $fullName);
        $mail->addAddress($email);
       

        $mail->isHTML(true);  
        $mail->Subject = 'Email Varifation From Sweety Blog';
       

        $email_template = "<h2>You have register with sweety blog </h2>
        <h5>Verify your email address to login please click the link below </h5>
        <a href='http://localhost/blogwebsite/admin/verifyEmail.php?token=$verifyToken'> Click here </a>
        ";
        

        $mail->Body = $email_template;
        $mail->send();
      

        // if (!$mail->send()) {
        //     echo "Can Not Send Any Mail!!!!!!! <br>";
        //     throw new Exception("Mailer Error: " . $mail->ErrorInfo);
        // }
    }
}
