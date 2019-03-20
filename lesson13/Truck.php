<?php

class Truck extends Automobile
{
    private $loadCapacity;

    public function __construct($brand, $model, $manufactureYear, $VINcode, $loadCapacity)
    {
        $this->loadCapacity = $loadCapacity;
        parent::__construct($brand, $model, $manufactureYear, $VINcode);
    }

    public function __toString()
    {
        return '~~TRUCK object~~' . PHP_EOL . parent::__toString() . PHP_EOL . 'Load capacity: ' . $this->loadCapacity;
    }
}