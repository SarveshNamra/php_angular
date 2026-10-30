<?php

class Database{
    private PDO $connection;

    public function __construct() {
        $host = "localhost";
        $dbname = "college_db";
        $username = "root";
        $password = "";

        // This is the default charset for MySQL.
        $dns = "mysql:host=$host;dbname=$dbname";

        $this->connection = new PDO($dns, $username, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function getConnection(): PDO{
        return $this->connection;
    }
}