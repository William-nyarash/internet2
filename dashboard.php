<?php
    session_start();

    if(!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles.css">
    <title>D&G | designs</title>
</head>
<body>
    <header>
        <div class="h2">D&G</div>
        <input type="checkbox" class="nav_toggle" name="" id="nav_toggle">
            <nav>
                <ul>
                    <li class="nav_item" ><a href="#"><?= htmlspecialchars($_SESSION['user_name']) ?></a></li>
                    <li class="nav_item" ><a href="logout.php">logout</a></li>
                </ul>
            </nav>
            <label for="nav_toggle" class="nav_toggle_label">
                <span></span>
            </label>
    </header>
    <main>
        <h1>Elastics in all ways</h1>
        <p>fabric that moves with you in  all weather.</p>
    </main>
</body>
</html>