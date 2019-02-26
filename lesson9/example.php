<?php
require_once 'LinkedList.php';
require_once 'Node.php';

$linkedList = new LinkedList();
$linkedList->append(1);
$linkedList->append(2);
$linkedList->append(3);
$linkedList->prepend(0);
$linkedList->deleteFirst();
$linkedList->deleteLast();
$linkedList->append(6);
$linkedList->searchByValue(6);
