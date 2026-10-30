<?php

require "db.php";

$name = $_POST["name"];

$sql = "SELECT * FROM students WHERE name='$name'";

// ---  Instead of above we can use prepare  ---


$stmt = $pdo->prepare("SELECT * FROM students WHERE name = :name");   // Here :name is a placeholder.

$stmt->execute(["name" => $name]);

// PDO stands for PHP Data Objects
$student = $stmt->fetch(PDO::FETCH_ASSOC);

// eg.- Insert Data Query using prepare statement

$name = "ABC";
$email = "abc@gmail.com";
$age = 12;
$maks = 87;


$stmt = $pdo->prepare(
    "INSTER INTO students
    (name, email, age, marks)
    VALUES
    (:name, :email, :age, :marks)"
);

$stmt->execute([
    "name" => $name,
    "email" => $email,
    "age" => $age,
    "marks" => $marks
]);

// Update table

$stmt = $pdo->prepare(
    "UPDATE students
    SET marks = :marks
    WHERE id = :id"
);

$stmt->execute([
    "marks" => $marks,
    "id" => $id
]);