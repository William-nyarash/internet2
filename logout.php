<?php
    session_start();
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit
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
    </header>
    <main>
        <h1>exititn gracefully</h1>
        <p>bye.....</p>
    </main>
</body>
</html>