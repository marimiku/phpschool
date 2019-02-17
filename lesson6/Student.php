<?php

class Student
{
    private $firstName;
    private $lastName;
    private $gender;
    private $status;
    private $gpa = 0.0;

    public function __construct($firstName, $lastName, $gender, $status)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->isValidGender($gender);
        $this->isValidStatus($status);
    }

    private function isValidGender($gender)
    {
        try {
            if ($gender === 0 || strcmp($gender, 'male') == 0) {
                $this->gender = 'male';
            } elseif
            ($gender === 1 || strcmp($gender, 'female') == 0) {
                $this->gender = 'female';
            } else {
                throw new Exception('Error: wrong gender value.');
            }
        } catch
        (Exception $e) {
            echo $e->getMessage();
            exit();
        }
    }

    private function isValidStatus($status)
    {
        try {
            if ($status === 1 || strcmp($status, 'freshman') == 0) {
                $this->status = 'freshman';
            } elseif ($status === 2 || strcmp($status, 'sophomore') == 0) {
                $this->status = 'sophomore';
            } elseif ($status === 3 || strcmp($status, 'junior') == 0) {
                $this->status = 'junior';
            } elseif ($status === 4 || strcmp($status, 'senior') == 0) {
                $this->status = 'senior';
            } else {
                throw new Exception('Error: wrong status value.');
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            exit();
        }
    }

    public function showMyself()
    {
        echo "First name: {$this->firstName}" . PHP_EOL . "Last name: {$this->lastName}" . PHP_EOL .
            "Gender: {$this->gender}" . PHP_EOL . "Status: {$this->status}" . PHP_EOL . "GPA: {$this->gpa}\n\n";
    }

    public function studyTime($study_time)
    {
        try {
            if (is_numeric($study_time)) {
                $this->gpa += log($study_time);
                ($this->gpa < 4) ? $this->gpa = round($this->gpa, 2) : $this->gpa = 4.0;
            } else {
                throw new Exception('Error: study_time variable must be a number.');
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            exit();
        }
    }
}

$t = new Student('Julia', 'Harrison', 'female', 2);
$t->showMyself();
$t->studyTime(4);
$t->showMyself();
