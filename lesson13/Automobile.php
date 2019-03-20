<?php

class Automobile
{
    private $brand;
    private $model;
    private $manufactureYear;
    private $VINcode;

    public function __construct($brand, $model, $manufactureYear, $VINcode)
    {
        $this->brand = $brand;
        $this->model = $model;
        $this->manufactureYear = $manufactureYear;
        $this->VINcode = $VINcode;
    }

    public function __toString()
    {
        return 'Name: ' . $this->brand . ' ' . $this->model . PHP_EOL
            . 'Manufactured: ' .$this->manufactureYear . PHP_EOL . 'VIN code: ' . $this->VINcode;
    }

    public function getBrand()
    {
        return $this->brand;
    }

    public function setBrand($brand)
    {
        $this->brand = $brand;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function setModel($model)
    {
        $this->model = $model;
    }

    public function getManufactureYear()
    {
        return $this->manufactureYear;
    }

    public function setManufactureYear($manufactureYear)
    {
        $this->manufactureYear = $manufactureYear;
    }

    public function getVINcode()
    {
        return $this->VINcode;
    }

    public function setVINcode($VINcode)
    {
        $this->VINcode = $VINcode;
    }


}