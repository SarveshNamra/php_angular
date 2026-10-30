<?php 
$host = "localhost";
$dbname = "college_db";
$username = "root";
$password = "";


try {
    // PDO means PHP Data Objects
    $pdo = new PDO(
        "$mysql:host=$host;dbname=$dbname",
        $username,
        $password
    );

    $pdo->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );
} catch (PDOException $e){
    echo "Database connection failed.";
}


