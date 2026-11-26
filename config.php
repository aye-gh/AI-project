<?php
// Update these details to match your local MySQL setup.
$host = "localhost";
$dbname = "sweet_bite_bakery";
$username = "root";
$password = "";

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $username,
        $password,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
         PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
    );
} catch (PDOException $e) {
    die("Database connection failed. Check config.php and import database.sql. Error: " . htmlspecialchars($e->getMessage()));
}
?>