<?php

class Node
{
    private $left = null;
    private $right = null;
    private $value;

    public function __construct($value)
    {
        $this->setValue($value);
    }

    public function rightIsFull()
    {
        return (!empty($this->right));
    }

    public function leftIsFull(){
        return (!empty($this->left));
    }

    public function __toString()
    {
        $result = "\nValue: {$this->value}\nLeft node [value]: ";
        empty($this->left) ? $result = $result . "null\n" : $result = $result . $this->left->getValue() . PHP_EOL;
        $result = $result . 'Right node [value]: ';
        empty($this->right) ? $result = $result . "null\n" : $result = $result . $this->right->getValue() . PHP_EOL;
        return $result;
    }

    public function getLeft()
    {
        return $this->left;
    }

    public function setLeft($left)
    {
        $this->left = $left;
    }

    public function getRight()
    {
        return $this->right;
    }

    public function setRight($right)
    {
        $this->right = $right;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }
}