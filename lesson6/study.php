<?php
require_once __DIR__ . '\Student.php';

function studentArrayToString($studentArray)
{
    foreach ($studentArray as $student) {
        echo $student;
    }
}

$studentList = [new Student('Mike', 'Barnes', 0, 'freshman', 4),
    new Student('Jim', 'Nickerson', 0, 'sophomore', 3),
    new Student('Jack', 'Indabox', 0, 'junior', 2.5),
    new Student('Jane', 'Miller', 1, 'senior', 3.6),
    new Student('Mary', 'Scott', 1, 'senior', 2.7)];

$studyTimer = [60, 100, 40, 300, 1000];

echo "Initial data:\n\n";
studentArrayToString($studentList);

echo "\nUpdating data...\n\n";
foreach ($studentList as $key => $student) {
    $student($studyTimer[$key]);
}

echo "Updated data:\n\n";
studentArrayToString($studentList);