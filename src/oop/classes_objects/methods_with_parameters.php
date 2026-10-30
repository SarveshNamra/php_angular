<?php

class Student {
    public string $name;
    public int $marks;

    public function __construct(string $name, int $marks) {
        $this->name = $name;
        $this->marks = $marks;
    }

    public function getResult(): string {           // Methods with Parameters
        if ($this->marks >= 40) {
            return "Pass";
        }

        return "Fail";
    }
}

$student = new Student("ABC", 46);

echo $student->name;
echo $student->getResult();