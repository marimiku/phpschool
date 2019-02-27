<?php

require_once 'BinaryTree.php';
require_once 'Node.php';

$array = [8, 3, 10, 14, 6, 7, 1, 13, 4];

$bt = new BinaryTree();
foreach ($array as $key)
    $bt->append($key);

echo $bt->search(100);
echo $bt->search(14);