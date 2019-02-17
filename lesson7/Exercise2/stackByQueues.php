<?php
require_once __DIR__ . '\FakedStack.php';

$stack = new FakedStack();

for ($i = 1; $i <= 10; $i++) {
    $stack->push($i);
}

for ($i = 1; $i <= 10; $i++) {
    echo $stack->pop() . ' ';
}
