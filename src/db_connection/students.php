<?php

require "db.php";

$sql = "SELECT * FROM students";

$stmt = $pdo->query($sql);

// PDO stands for PHP Data Objects
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);

print_r($students);


foreach ($students as $student) {
    echo "Name: " . $student["name"] . "<br>";
    echo "Email: " . $student["email"] . "<br>";
    echo "Age: " . $student["age"] . "<br>";
    echo "Marks: " . $student["marks"] . "<br>";

    echo "<hr>";
}

