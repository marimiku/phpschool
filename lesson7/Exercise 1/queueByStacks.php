<?php
require_once __DIR__ . '\FakedQueue.php';

$queue = new FakedQueue();

for ($i = 1; $i <= 10; $i++) {
    $queue->enqueue($i);
}

for ($i = 1; $i <= 10; $i++) {
    echo $queue->dequeue() . ' ';
}

