<?php

require_once __DIR__ . "/Database.php";

class StudentRepository {
    private PDO $connection;

    public function __construct(Database $database) {
        $this->connection = $database->getConnection();
    }

    public function getAllStudents(): array{
        $sql = "SELECT id, name, email, age, marks FROM students ORDER BY id DESC";

        $stmt = $this->connection->query($sql);

        return $stmt->fetchAll();
    }

    public function addStudent(string $name, string $email, int $age, float $marks): bool {
        $sql = "INSERT INTO students (name, email, age, marks) VALUES (:name, :email, :age, :marks)";

        $stmt = $this->connection->prepare($sql);

        return $stmt->execute(["name" => $name, "email" => $email, "age" => $age, "marks" => $marks]);
    }

    public function updateStudent(int $id, string $name, string $email, int $age, float $marks): bool {
        $sql = "UPDATE students
                SET name = :name,
                    email = :email,
                    age = :age,
                    marks = :marks
                WHERE id = :id";

        $stmt = $this->connection->prepare($sql);

        return $stmt->execute(["id" => $id, "name" => $name, "email" => $email, "age" => $age, "marks" => $marks]);
    }

    public function deleteStudent(int $id): bool {
        $sql = "DELETE FROM students WHERE id = :id";
        $stmt = $this->connection->prepare($sql);

        return $stmt->execute(["id" => $id]);
    }
}