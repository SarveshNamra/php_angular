<?php

require_once __DIR__ . "/../Database.php";
require_once __DIR__ . "/../StudentRepository.php";

header("Content-Type: application/json; charset=UTF-8");

try {
    $database = new Database();
    $studentRepository = new StudentRepository($database);

    $method = $_SERVER["REQUEST_METHOD"];

    if ($method === "GET") {
        $students = $studentRepository->getAllStudents();
        echo json_encode([
            "success" =>true,
            "data" => $students,
        ]);
    }

    else if ($method === "POST") {
        $data = json_decode(file_get_contents("php://input"), true);

        if (
            !is_array($data) ||
            !isset($data["name"], $data["email"], $data["age"], $data["marks"]) ||
            !is_string($data["name"]) ||
            !is_string($data["email"]) ||
            !is_numeric($data["age"]) ||
            !is_numeric($data["marks"]) ||
            trim($data["name"]) === "" ||
            !filter_var($data["email"], FILTER_VALIDATE_EMAIL) ||
            (int)$data["age"] <= 0 ||
            (float)$data["marks"] < 0 ||
            (float)$data["marks"] > 100
        ) {

            http_response_code(400);

            echo json_encode([
                "success" => false,
                "message" => "Invalid request data."
            ]);

            exit;
        }

        $result = $studentRepository->addStudent(
            trim($data["name"]),
            trim($data["email"]),
            (int)$data["age"],
            (float)$data["marks"]
        );

        if ($result) {

            http_response_code(201);

            echo json_encode([
                "success" => true,
                "message" => "Student added successfully."
            ]);

        } else {

            http_response_code(500);

            echo json_encode([
                "success" => false,
                "message" => "Unable to add student."
            ]);
        }
    }

    else if ($method === "PUT") {
        $id = filter_var($_GET["id"] ?? null, FILTER_VALIDATE_INT);

        $data = json_decode(file_get_contents("php://input"), true);

        if (!$id || !is_array($data) || !isset($data["name"], $data["email"], $data["age"], $data["marks"]) 
            || !is_string($data["name"]) || !is_string($data["email"]) 
            || !is_numeric($data["age"]) || !is_numeric($data["marks"])
            || trim ($data["name"]) === ""
            || !filter_var($data["email"], FILTER_VALIDATE_EMAIL)
            || (int)$data["age"] <= 0
            || (float)$data["marks"] < 0
            || (float)$data["marks"] > 100) {
                http_response_code(400);

                echo json_encode([
                    "success" => false,
                    "message" => "Invalid request data.",
                ]);

                exit;   
        }

        // $result = $studentRepository->addStudent(trim($data["name"]), trim($data["email"]), 
        //                                     (int)$data["age"], (float)$data["marks"]);

        $result = $studentRepository->updateStudent($id, trim($data["name"]), trim($data["email"]), 
                                            (int)$data["age"], (float)$data["marks"]);

        if ($result) {
            echo json_encode([
                "success" => true,
                "message" => "Student updated successfully."
            ]);

        } else {
            http_response_code(500);
            echo json_encode([
                "success" => false,
                "message" => "Unable to update student."
            ]);
        }
    }

    else if ($method === "DELETE") {
        $id = filter_var($_GET["id"] ?? null, FILTER_VALIDATE_INT);

        if (!$id) {
            http_response_code(400);

            echo json_encode([
                "success" => false,
                "message" => "Invalid student ID.",
            ]);
            exit;
        }

        $result = $studentRepository->deleteStudent($id);

        if ($result) {
            echo json_encode([
                "success" => true,
                "message" => "Student deleted successfully.",
            ]);
        }
        else {
            http_response_code(500);

            echo json_encode([
                "success" => false,
                "message" => "Unable to delete student.",
            ]);
        }
    }

    else {
        http_response_code(405);

        echo json_encode([
            "success" => false,
            "message" => "Method not allowed.",
        ]);
    }


}
catch (Throwable $e) {

    http_response_code(500);

    echo json_encode([
        "success" => false,
        "message" => $e->getMessage(),
        "file" => $e->getFile(),
        "line" => $e->getLine()
    ]);
}