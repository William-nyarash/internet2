<?php
    $host = 'localhost';
    $database = 'registration';
    $dbusername = 'root';
    $dbpassword = '';


    $databaseconnection = "mysql: host=$host;dbname=$database";

    try{
        $pdo = new PDO($databaseconnection, $dbusername, $dbpassword);
        $pdo ->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>