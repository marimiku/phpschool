<?php

class Car extends Automobile
{
    private $compl;

    public function __construct($brand, $model, $manufactureYear, $VINcode, $compl)
    {
        $this->compl = $compl;
        parent::__construct($brand, $model, $manufactureYear, $VINcode);
    }

    public function __toString()
    {
        return '~~CAR object~~' . PHP_EOL . parent::__toString() . PHP_EOL . 'Complect: ' . $this->compl;
    }


}