<?php
include_once 'c:\newxampp2\xampp\htdocs\blogwebsite\lib\Database.php';
include_once 'c:\newxampp2\xampp\htdocs\blogwebsite\lib\Session.php';

Session::init();
$db = new Database();

$email = isset($_GET['email']) ? $_GET['email'] : null;
$token = isset($_GET['token']) ? $_GET['token'] : null;

// Initialize message variable
$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];

    // Basic validation
    if (empty($email) || empty($password1) || empty($password2)) {
        Session::set('message', "All fields are required!");
    } elseif ($password1 !== $password2) {
        Session::set('message', "Passwords do not match!");
    } else {
        // Check if email exists
        $query = "SELECT * FROM user_registration_info WHERE email = '$email'";
        $result = $db->select($query);

        if ($result && mysqli_num_rows($result) > 0) {
            // Hash the new password
            $hashed_password = password_hash($password1, PASSWORD_DEFAULT);
            
            // Update password
            $updateQuery = "UPDATE user_registration_info SET 
                          password = '$hashed_password' 
                          WHERE email = '$email'";
            
            $updated = $db->update($updateQuery);
            
            if ($updated) {
                Session::set('message', "Password updated successfully!");
                // Redirect to login page after 2 seconds
                header("refresh:2;url=login.php");
            } else {
                Session::set('message', "Error updating password!");
            }
        } else {
            Session::set('message', "Email not found!");
        }
    }
    $message = Session::get('message');
    Session::set('message', ''); // Clear the message
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300, 400,700|Inconsolata:400,700" rel="stylesheet">

    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">

    <link rel="stylesheet" href="../fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="../fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../fonts/flaticon/font/flaticon.css">
</head>

<body>
    <?php if (!empty($message)): ?>
    <div class="alert <?php echo strpos($message, 'successfully') !== false ? 'alert-success' : 'alert-danger'; ?> alert-dismissible fade show" role="alert">
        <?php echo $message; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif; ?>

    <style>
        /* Importing fonts from Google */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

        /* Reseting */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #ecf0f3;
        }

        .wrapper {
            max-width: 350px;
            min-height: 500px;
            margin: 80px auto;
            padding: 40px 30px 30px 30px;
            background-color: #ecf0f3;
            border-radius: 15px;
            box-shadow: 13px 13px 20px #cbced1, -13px -13px 20px #fff;
        }

        .logo {
            width: 80px;
            margin: auto;
        }

        .logo img {
            width: 100%;
            height: 80px;
            object-fit: cover;
            border-radius: 50%;
            box-shadow: 0px 0px 3px #5f5f5f,
                0px 0px 0px 5px #ecf0f3,
                8px 8px 15px #a7aaa7,
                -8px -8px 15px #fff;
        }

        .wrapper .name {
            font-weight: 600;
            font-size: 1.4rem;
            letter-spacing: 1.3px;
            padding-left: 10px;
            color: #555;
        }

        .wrapper .form-field input {
            width: 100%;
            display: block;
            border: none;
            outline: none;
            background: none;
            font-size: 1.2rem;
            color: #666;
            padding: 10px 15px 10px 10px;
            /* border: 1px solid red; */
        }

        .wrapper .form-field {
            padding-left: 10px;
            margin-bottom: 20px;
            border-radius: 20px;
            box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #fff;
        }

        .wrapper .form-field .fas {
            color: #555;
        }

        .wrapper .btn {
            box-shadow: none;
            width: 100%;
            height: 40px;
            background-color: #03A9F4;
            color: #fff;
            border-radius: 25px;
            box-shadow: 3px 3px 3px #b1b1b1,
                -3px -3px 3px #fff;
            letter-spacing: 1.3px;
        }

        .wrapper .btn:hover {
            background-color: #039BE5;
        }

        .wrapper a {
            text-decoration: none;
            font-size: 0.8rem;
            color: #03A9F4;
        }

        .wrapper a:hover {
            color: #039BE5;
        }

        @media(max-width: 380px) {
            .wrapper {
                margin: 30px 20px;
                padding: 40px 15px 15px 15px;
            }
        }
    </style>


    <div class="wrapper">
        <div class="logo">
            <img src="https://www.freepnglogos.com/uploads/twitter-logo-png/twitter-bird-symbols-png-logo-0.png" alt="">
        </div>

        <!-- when user submit all the data of this from this time it send a post method on the server -->
        <form class="p-3 mt-3" action="" method="POST">

            <!--Email -->
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="email" id="email" placeholder="Email Address" value="<?php echo htmlspecialchars($email ?? ''); ?>">
            </div>

            <!--New Password -->
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="password" name="password1" id="pwd1" placeholder="New Password">
            </div>
            
            <!--Confirm Password -->
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password2" id="pwd2" placeholder="Confirm Password">
            </div>
            
            <button type="submit" class="btn mt-3">Change Password</button>

        </form>
    </div>

    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/jquery-migrate-3.0.0.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/jquery.waypoints.min.js"></script>
    <script src="../js/jquery.stellar.min.js"></script>

</body>

</html>