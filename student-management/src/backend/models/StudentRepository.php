<?php

require_once __DIR__ . '/../config/Database.php';

class StudentRepository {
    private PDO $connection;

    public function __construct(Database $database) {
        $this->connection = $database->getConnection();
    }

    public function getAllStudents(): array {
        $sql = "SELECT * FROM students ORDER BY id DESC";
        $stmt = $this->connection->query($sql);
        return $stmt->fetchAll();
    }
}