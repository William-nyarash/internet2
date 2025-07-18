<?php
    require "config.php";
    ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    session_start();

    if ($_SERVER["REQUEST_METHOD"]  == "POST") {
        $email = trim($_POST['email']);
        $password = $_POST['password'];

        if(empty($email) || empty($password)) {
            $error = "Please enter both fields";
        }else {
            $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?") ;
            $stmt ->execute([$email]);
            $user = $stmt-> fetch();

            if ($user && password_verify($password, $user['password']) ) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                header("Location: dashboard.php");
                exit;
            } else {
                $error = "Invalid credentials.";
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
                    <li class="nav_item" ><a href="./signup.html">register</a></li>
                </ul>
            </nav>
            <label for="nav_toggle" class="nav_toggle_label">
                <span></span>
            </label>
    </header>
    <div class="main">
        <form action="" method="post">
            <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
            <div class="data_field">
                <label for="email">email</label>
                <input type="email" name="email" id="email">
            </div>
            <div class="data_field">
                <label for="password">password</label>
                <input type="password" name="password">
            </div>
            <button>log in</button>
        </form>
    </div>
</body>
</html>