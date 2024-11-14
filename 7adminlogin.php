<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "brigade");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['login'])) {
    if (isset($_POST['username'], $_POST['password']) && !empty($_POST['username']) && !empty($_POST['password'])) {
        $user = $_POST['username'];
        $pass = $_POST['password'];
       
        $query = "SELECT * FROM user WHERE Username='$user' AND Password='$pass'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $id = $row['ID'];
            $_SESSION['user'] = $user; // Save user data to session
            $_SESSION['id'] = $id;
            header("Location: /Brigade/1homepage.php");
            exit;
        } else {
            echo "Invalid username or password";
        }
    } else {
        echo "Please fill in both fields";
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Brigade Clothing</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
    <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="styles/categories_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/single_responsive.css">
    <style>
        body {
            background-color: white;
            color: black;
            overflow: hidden;
        }
        .login-container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
            width: 350px;
            margin: 200px auto; /* Center the form */
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
            font-size: 30px;
            color: black;
            font-weight: bold;
        }
        label {
            display: block;
            text-align: left;
            margin-bottom: 5px;
            font-size: 14px;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #444;
            border-radius: 20px;
            background-color: white;
            color: gray;
            font-size: 14px;
            transition: border 0.3s;
        }
        input[type="text"]:focus,
        input[type="password"]:focus {
            border: 1px solid gray;
            outline: none;
        }
        input[type="submit"] {
            background-color: black;
            color: white;
            margin-top: 10px;
            padding: 12px;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-size: 16px;
            width: 280px;
            transition: background-color 0.3s, transform 0.2s;
        }
        input[type="submit"]:hover {
            background-color: #555;
            transform: translateY(-1px);
        }
        .forgot-password {
            margin-top: 10px;
            font-size: 12px;
            margin: 2px auto;
        }
        .forgot-password a {
            color: #bbb;
            text-decoration: none;
            margin-right: 90px;
        }
        .forgot-password a:hover {
            text-decoration: underline;
        }
        .toggle-password {
            cursor: pointer;
            position: absolute;
            right: 20px;
            top: 24px;
            color: gray;
            font-size: 20px;
        }
        .footer-logo{
           cursor: default; 
        }
    </style>
</head>

<body>

<!-- Header -->

<header class="header trans_300">	

<!-- Main Navigation -->

<div class="main_nav_container">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-right">
                <div class="logo_container">
                    <a href="1index2.php"><img src="assets/1.png"></a>
                </div>
                <nav class="navbar">
                    <ul class="navbar_menu">
                    <li><a href="1homepage.php">home</a></li>
                            <li><a href="3shop.php">shop</a></li>
                            <li><a href="#">new</a></li>
                            <li><a href="#">on sale</a></li>
                            <li><a href="4recentorders.php">Recent Orders</a></li>
                            <li><a href="logout.php">Logout</a></li>
                    </ul>
                    <ul class="navbar_user">
                        <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                        <li><a href="4myacc.php"><i class="fa fa-user" aria-hidden="true"></i></a></li>
                        <li class="checkout">
                            <a href="3cart.php">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                <span id="checkout_items" class="checkout_items"></span>
                            </a>
                        </li>
                    </ul>
                    <div class="hamburger_container">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>

</header>

<div class="fs_menu_overlay"></div>


        <!-- Hamburger Menu -->
        <div class="hamburger_menu">
            <div class="hamburger_close"><i class="fa fa-times" aria-hidden="true"></i></div>
            <div class="hamburger_menu_content text-right">
                <ul class="menu_top_nav">
                    <li class="menu_item has-children">
                        <a href="#">
                            My Account
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="menu_selection">
                            <li><a href="#"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign In</a></li>
                            <li><a href="#"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a></li>
                        </ul>
                    </li>
                    <li class="menu_item"><a href="#">home</a></li>
                    <li class="menu_item"><a href="#">shop</a></li>
                    <li class="menu_item"><a href="#">new</a></li>
                    <li class="menu_item"><a href="#">on sale</a></li>
                </ul>
            </div>
        </div>

        <div class="container single_product_container">
            <div class="row">
                <div class="col">
                    <!-- Login Form -->
                    <div class="login-container">
                        <img src="assets/2.png" class="footer-logo">
                        <form method="POST">
                            <label for="username">Username:</label>
                            <input type="text" id="username" name="username" required>
                            
                            <label for="password">Password:</label>
                            <div style="position: relative;">
                                <input type="password" id="password" name="password" required>
                                <i id="toggle-password-icon" class="fa fa-eye toggle-password" onclick="togglePassword()"></i>
                            </div>
                            
                            <input type="submit" name="login" value="Login">
                            <div class="forgot-password">
                                <a href="7forgotpass.php">Forgot Password?</a>
                            </div>
                            <br>
                            <div class="sign-up-link">
                               <a>Don't have an account? </a> <a href="4signup.php">Sign up</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <script>
        function togglePassword() {
            const passwordField = document.getElementById('password');
            const toggleIcon = document.getElementById('toggle-password-icon');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }
    </script>
    <script>
    // JavaScript to make the navbar opaque when scrolling
    window.addEventListener('scroll', function() {
        const mainNav = document.querySelector('.main_nav_container');
        
        if (window.scrollY > 50) { // Adjust the scroll threshold as needed
            mainNav.classList.add('opaque');
        } else {
            mainNav.classList.remove('opaque');
        }
    });
</script>
</body>
</html>