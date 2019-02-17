<?php

class Student
{
    private $firstName;
    private $lastName;
    private $gender;
    private $status;
    private $gpa;

    public function __construct($firstName, $lastName, $gender, $status, $gpa = 0.0)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        try {
            $this->isValidGender($gender);
            $this->isValidStatus($status);
            $this->isValidGpa($gpa);
        } catch (Exception $e) {
            echo $e->getMessage();
            exit();
        }
    }

    private function isValidGender($gender)
    {
        if ($gender === 0 || strcmp($gender, 'male') == 0) {
            $this->gender = 'male';
        } elseif
        ($gender === 1 || strcmp($gender, 'female') == 0) {
            $this->gender = 'female';
        } else {
            throw new Exception('Error: wrong gender value.');
        }
    }

    private function isValidStatus($status)
    {
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
    }

    private function isValidGpa($gpa)
    {
        if (is_numeric($gpa)) {
            ($gpa < 4) ? $this->gpa = round($gpa, 2) : $this->gpa = 4.0;
        } else {
            throw new Exception('Error: wrong GPA value.');
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

