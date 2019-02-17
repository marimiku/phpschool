<?php

class Queue
{
    private $head = 0;
    private $tail = 0;
    private $warehouse = [];

    public function enqueue($value)
    {
        $this->warehouse[$this->tail++] = $value;
    }

    public function dequeue()
    {
        if ($this->isEmpty()) {
            throw new RuntimeException("Queue is empty");
        }
        $result = $this->warehouse[$this->head++];
        if ($this->head > $this->tail) {
            $this->head = $this->tail = 0;
        }
        return $result;
    }

    public function isEmpty()
    {
        return $this->head === $this->tail;
    }

    public function getSize() {
        return count($this->warehouse);
    }

}