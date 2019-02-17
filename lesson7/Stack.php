<?php

class Stack
{
    private $top = 0;
    private $warehouse = [];

    public function push($value)
    {
        $this->warehouse[$this->top++] = $value;
    }

    public function pop()
    {
        if ($this->isEmpty()) {
            throw new RuntimeException("Stack is empty!");
        }
        return $this->warehouse[--$this->top];
    }

    public function isEmpty()
    {
        return $this->top === 0;
    }

    public function last()
    {
        if ($this->isEmpty()) {
            throw new RuntimeException("Stack is empty!");
        }
        return $this->warehouse[$this->top - 1];
    }
}

