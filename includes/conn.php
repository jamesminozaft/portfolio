<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "james"; 

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $pdo->exec("SET NAMES 'utf8'");
    
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>