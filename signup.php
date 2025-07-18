<?php 
    require 'config.php';
    ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

    if  ($_SERVER["REQUEST_METHOD"] == "POST")   {    
        $username = trim($_POST['username']);
        $email = trim($_POST['email']);
        $phone = trim($_POST['phone']);
        $password =$_POST['password'];

        if(empty($username) || empty($email) || empty($phone) || empty($password)) {
            $error = "All fields are required";
        }
        else {
            $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
            $stmt ->execute([$email]);
            if($stmt->fetch()) {
                $error = "Email already registered.";
            }else {
                $hashed = password_hash($password, PASSWORD_BCRYPT);
                $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
                $stmt->execute([$username, $email, $hashed]);
                header("Location: login.php");
                exit;
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="./css/styles.css">
     <link rel="stylesheet" href="./css/login.css">
    <title>D&G |  designs</title>
</head>
<body>
    <header>
        <div class="h2">D&G</div>
        <input type="checkbox" class="nav_toggle" name="" id="nav_toggle">
            <nav>
                <ul>
                    <li class="nav_item" ><a href="#">services</a></li>
                    <li class="nav_item" ><a href="./login.html">Login</a></li>
                </ul>
            </nav>
            <label for="nav_toggle" class="nav_toggle_label">
                <span></span>
            </label>
    </header>
    <div class="main">
        <form action="" method="post">
            <div class="data_field">
                <label for="username">username</label>
                <input type="text" name="username" id="username" required>
            </div>
            <div class="data_field">
                <label for="email">email</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="data_field">
                <label for="phone">
                    phone
                </label>
                <input type="number" name="phone" id="phone">
            </div>
            <div class="data_field">
                <label for="password">password</label>
                <input type="password" name="password" required>
            </div>
            <button>register</button>
        </form>
    </div>
</body>
</html>