<?php
require_once __DIR__ . '\..\Exercise 3\Stack.php';

class FakedQueue
{
    private $stack1;
    private $stack2;

    public function __construct()
    {
        $this->stack1 = new Stack();
    }

    public function enqueue($value)
    {
        $this->stack1->push($value);
    }

    public function dequeue()
    {
        $this->stack2 = new Stack();
        if ($this->stack1->isEmpty()) {
            throw new Exception('Error: The FakedQueue is empty, nothing to dequeue.');
        } else while (!$this->stack1->isEmpty()) {
            $this->stack2->push($this->stack1->pop());
        }
        $popped = $this->stack2->pop();
        while (!$this->stack2->isEmpty()) {
            $this->stack1->push($this->stack2->pop());
        }
        return $popped;
    }
}