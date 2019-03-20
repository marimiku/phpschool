<?php

include_once "parse.php";
include_once "Automobile.php";
include_once "Car.php";
include_once "Truck.php";
date_default_timezone_set('Europe/Kiev');

$automobilesArray = parseDB("carsDB.txt");
$catalogue = [];

for ($i = 0; $i < 100; $i++) {
    $autoPrototypeIndex = rand(0, count($automobilesArray)-1);
    $brand = $automobilesArray[$autoPrototypeIndex]->brand;
    $model = $automobilesArray[$autoPrototypeIndex]->model;
    $year = strcmp($automobilesArray[$autoPrototypeIndex]->to, "-") === 1
        ? rand($automobilesArray[$autoPrototypeIndex]->since, (int)date('Y'))
        : rand($automobilesArray[$autoPrototypeIndex]->since, $automobilesArray[$autoPrototypeIndex]->to);
    $vin = generateVIN();

    $current = (rand(0, 1) === 0)
        ? new Car($brand, $model, $year, $vin, "Complectation's empty")
        : new Truck($brand, $model, $year, $vin, rand(1, 20));
    array_push($catalogue, $current);
}
//
//print_r($catalogue);

foreach ($catalogue as $c) {
    echo $c->__toString() . "\n\n";
}

function generateVIN() {
    $chars = 'ABDEFGHKNQRSTYZ0123456789';
    $numChars = strlen($chars);
    $string = '';
    for ($i = 0; $i < 13; $i++) {
        $string .= substr($chars, rand(1, $numChars) - 1, 1);
    }
    return $string;
}
