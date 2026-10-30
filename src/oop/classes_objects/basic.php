<?php

class Student {
    public string $name;                // properties
    public string $email;
    public int $age;

    public function info() {            // method
        return "Email is " . $this->email;
    }
}

$student = new Student();

$student->name = "AMC";
$student->email = "amc@gmail.com";
$student->age = 12;

echo $student->name;

$student->email = "ema@gmail.com";
echo $student->info();

// Constructor

class Teacher {
    public string $th_name;
    public string $th_email;
    public int $th_age;

    public function __construct(string $th_name, string $th_email, int $th_age){
        $this->th_name = $th_name;
        $this->th_email = $th_email;
        $this->th_age = $th_age;
    }
}

$teacher = new Teacher("SJD", "sdj@gmail.com", 34);