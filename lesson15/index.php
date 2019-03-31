<?php

include_once "Calendar.php";

$calendar = Calendar::getInstance(0, 'Asia/Tokyo');
$calendar2 = Calendar::getInstance(0, 'Europe/Kiev');

echo $calendar->today();
echo $calendar->showMonth(11);
echo $calendar->showYear();

$calendar->addEvent('Commit hometask to the public repo.', 15, 15,45, 28, 03);
$calendar->addEvent('Add link to the classroom.', 15, 9,0, 30, 03);
$calendar2->addEvent('Send it on review.', 15, 01,5, 1, 4);

echo $calendar->showEvents();