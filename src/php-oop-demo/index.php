<?php

require_once __DIR__ . "/Database.php";
require_once __DIR__ . "/StudentRepository.php";

try {
    $database = new Database();

    $studentRepository = new StudentRepository($database);

    $studentRepository->addStudent("Sai Kumar", "sai@gmail.com", 20, 90.0);

    echo "Student added successfully";

    $students = $studentRepository->getAllStudents();

    foreach ($students as $student) {
        echo "ID: " . $student["id"] . "<br>";
        echo "Name: " . htmlspecialchars($student["name"], ENT_QUOTES, "UTF-8") . "<br>";
        echo "Email: " . htmlspecialchars($student["email"], ENT_QUOTES, "UTF-8") . "<br>";
        echo "Age: " . $student["age"] . "<br>";
        echo "Marks: " . $student["marks"] . "<br>";
        echo "<hr>";
    }
}
catch (Throwable $e) {

    echo "<h3>Database Debugging Error</h3>";

    echo "<pre>";
    echo htmlspecialchars($e->getMessage());
    echo "</pre>";

}