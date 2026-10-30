<?php

class Student {
    private int $marks;

    public function setMarks(int $marks): void {
        if ($marks < 0 || $marks > 100) {
            throw new InvalidArgumentException(
                "Marks must be in between 0 to 100"
            );
        }

        $this->marks = $marks;
    }

    public function getMarks(): int {
        return $this->marks;
    }
}

$student = new Student(34);

echo $student->setMarks(34);
echo $student->getMarks();