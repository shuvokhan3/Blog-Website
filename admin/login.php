<?php
// Start of login.php
include_once 'c:\newxampp2\xampp\htdocs\blogwebsite\lib\Session.php';
// Clear any existing session status on direct page load
if (!isset($_GET['token']) && !isset($_POST['gmail'])) {
    unset($_SESSION['status']);
}

include_once 'c:\newxampp2\xampp\htdocs\blogwebsite\classes\adminLogin.php';

$adminLogin = new adminLogin();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['gmail'];
    $password = $_POST['password'];

    $checkLogin = $adminLogin->LoginUser($email, $password);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sweety Blog</title>
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

        .name {
            text-align: center;
            margin-bottom: 30px;
        }

        .name h3 {
            color: #333;
            font-size: 1.5rem;
            margin-bottom: 5px;
        }

        .name p {
            color: #666;
            font-size: 0.9rem;
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

        .btn-login {
            background: #3b82f6;
            color: white;
        }

        .btn-login:hover {
            background: #2563eb;
        }

        .alert {
            position: fixed;
            top: 20px;
            right: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            animation: slideIn 0.5s ease-out;
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

        .footer-links {
            text-align: center;
            margin-top: 20px;
        }

        .footer-links a {
            color: #666;
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.3s ease;
        }

        .footer-links a:hover {
            color: #3b82f6;
        }

        .divider {
            display: inline-block;
            margin: 0 10px;
            color: #ddd;
        }

        .verification-link {
            margin-top: 15px;
            text-align: center;
        }

        .verification-link a {
            color: #666;
            font-size: 0.85rem;
            text-decoration: none;
        }

        .verification-link a:hover {
            color: #3b82f6;
        }
    </style>
</head>

<body>
    <?php if (isset($_SESSION['status'])): ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?= $_SESSION['status'] ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <div class="wrapper">
        <div class="logo">
            <img src="https://www.freepnglogos.com/uploads/twitter-logo-png/twitter-bird-symbols-png-logo-0.png" alt="Logo">
        </div>
        
        <div class="name">
            <h3>Welcome Back</h3>
            <p>Sign in to continue to Sweety Blog</p>
        </div>

        <form method="POST">
            <div class="form-field">
                <i class="fas fa-envelope"></i>
                <input type="email" name="gmail" placeholder="Email Address" required>
            </div>

            <div class="form-field">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Password" required>
            </div>

            <button type="submit" class="btn btn-login">Sign In</button>
            
            <div class="footer-links">
                <a href="passwordReset.php">Forgot Password?</a>
                <span class="divider">•</span>
                <a href="register.php">Create Account</a>
            </div>
        </form>

        <div class="verification-link">
            <a href="resendEmail.php">Didn't receive verification email?</a>
        </div>
    </div>

    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>