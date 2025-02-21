<?php
include_once 'c:\newxampp2\xampp\htdocs\blogwebsite\classes\ResendEmail.php';

//ResendEmail class i create an object name ResendEmailObj
$ResendEmailObj = new ResendEmail();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['gmail'];
    
    //inside this ResendEmail class i create a method anme resendEmail and it takes a parameter
    $resend = $ResendEmailObj->resendEmail($email);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resend Verification - Sweety Blog</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #f0f2f5;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .wrapper {
            width: 380px;
            padding: 40px 30px;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        .logo {
            width: 80px;
            height: 80px;
            margin: 0 auto 20px;
        }

        .logo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
            padding: 3px;
            border: 2px solid #3b82f6;
        }

        .header-text {
            text-align: center;
            margin-bottom: 30px;
        }

        .header-text h3 {
            color: #333;
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .header-text p {
            color: #666;
            font-size: 0.9rem;
            line-height: 1.5;
        }

        .form-field {
            position: relative;
            margin-bottom: 20px;
        }

        .form-field input {
            width: 100%;
            padding: 12px 15px 12px 45px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 0.95rem;
            color: #333;
            transition: all 0.3s ease;
        }

        .form-field input:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
            outline: none;
        }

        .form-field i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #666;
        }

        .btn {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 500;
            margin-bottom: 15px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-resend {
            background: #3b82f6;
            color: white;
        }

        .btn-resend:hover {
            background: #2563eb;
        }

        .btn-login {
            background: #f3f4f6;
            color: #333;
        }

        .btn-login:hover {
            background: #e5e7eb;
        }

        .alert {
            position: fixed;
            top: 20px;
            right: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            animation: slideIn 0.5s ease-out;
            z-index: 1000;
        }

        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .divider {
            text-align: center;
            margin: 20px 0;
            position: relative;
        }

        .divider::before {
            content: "";
            position: absolute;
            left: 0;
            top: 50%;
            width: 45%;
            height: 1px;
            background: #ddd;
        }

        .divider::after {
            content: "";
            position: absolute;
            right: 0;
            top: 50%;
            width: 45%;
            height: 1px;
            background: #ddd;
        }

        .divider span {
            background: #fff;
            padding: 0 10px;
            color: #666;
            font-size: 0.9rem;
        }
    </style>
</head>

<body>
    <?php if (isset($resend)): ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?= $resend ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <div class="wrapper">
        <div class="logo">
            <img src="https://www.freepnglogos.com/uploads/twitter-logo-png/twitter-bird-symbols-png-logo-0.png" alt="Logo">
        </div>
        
        <div class="header-text">
            <h3>Resend Verification Email</h3>
            <p>Enter your email address to receive a new verification link</p>
        </div>

        <form method="POST">
            <div class="form-field">
                <i class="fas fa-envelope"></i>
                <input type="email" name="gmail" placeholder="Enter your email address" required>
            </div>

            <button type="submit" class="btn btn-resend">Resend Verification Email</button>
        </form>

        <div class="divider">
            <span>or</span>
        </div>

        <a href="login.php" class="btn btn-login">Back to Login</a>
    </div>

    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>