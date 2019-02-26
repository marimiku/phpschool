<?php

class Node
{
    private $value;
    private $next = null;
    private $previous = null;

    public function __construct($value)
    {
        $this->setValue($value);
    }

    public function __toString()
    {
        $result = "Value: {$this->value}\nPrevious node [value]: ";
        empty($this->previous) ? $result = $result . "null\n" : $result = $result . $this->previous->getValue() . PHP_EOL;
        $result = $result . 'Next node [value]: ';
        empty($this->next) ? $result = $result . "null\n" : $result = $result . $this->next->getValue() . PHP_EOL;
        return $result;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

    public function getNext()
    {
        return $this->next;
    }

    public function setNext($next)
    {
        $this->next = $next;
    }

    public function getPrevious()
    {
        return $this->previous;
    }

    public function setPrevious($previous)
    {
        $this->previous = $previous;
    }

}