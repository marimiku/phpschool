<?php

class ParsedAuto
{
    public $brand;
    public $model;
    public $since;
    public $to;

    public function __construct($brand, $model, $since, $to)
    {
        $this->brand = $brand;
        $this->model = $model;
        $this->since = $since;
        $this->to = $to;
    }
}
