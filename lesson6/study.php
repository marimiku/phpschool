<?php
require_once __DIR__.'\Student.php';

$studentList = [new Student('Mike', 'Barnes', 0, 'freshman', 4),
    new Student('Jim', 'Nickerson', 0, 'sophomore', 3),
    new Student('Jack', 'Indabox', 0, 'junior', 2.5),
    new Student('Jane', 'Miller', 1, 'senior', 3.6),
    new Student('Mary', 'Scott', 1, 'senior', 2.7)];

echo "Initial data:\n\n";
foreach ($studentList as $student) {
    $student->showMyself();
}

