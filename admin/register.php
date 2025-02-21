<?php

//connect register.php file for the functional operation of this  registration 
include_once('C:/newxampp2/xampp/htdocs/blogwebsite/classes/register.php');

//create on object of the Register class
$register = new Register();

//if the request method post successfull on the server this time i want to get this field value;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //addUser() method call using $register object;
    $addUser = $register->AddUser($_POST);

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Sweety Blog</title>
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

        .wrapper .name {
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

        .btn-signup {
            background: #3b82f6;
            color: white;
        }

        .btn-signup:hover {
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
            margin-bottom: 20px;
            border-radius: 8px;
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
    <?php if (isset($addUser)): ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?= $addUser ?>
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
            <h3>Create Account</h3>
            <p>Join Sweety Blog community today</p>
        </div>

        <form action="" method="POST">
            <div class="form-field">
                <i class="fas fa-user"></i>
                <input type="text" name="name" placeholder="Full Name" required>
            </div>

            <div class="form-field">
                <i class="fas fa-phone"></i>
                <input type="number" name="number" placeholder="Phone Number" required>
            </div>

            <div class="form-field">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" placeholder="Email Address" required>
            </div>

            <div class="form-field">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Password" required>
            </div>

            <button type="submit" class="btn btn-signup">Sign Up</button>
        </form>

        <div class="divider">
            <span>or</span>
        </div>

        <a href="login.php" class="btn btn-login">Already have an account? Login</a>
    </div>

    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>