<?php

class Database {
    private PDO $connection;

    public function __construct() {
        $host = 'localhost';
        $dbname = 'college_db';
        $username = 'root';
        $password = '';

        $dsn = "mysql:host=$host;dbname=$dbname";

        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function getConnection(): PDO {
        return $this->connection;
    }
}