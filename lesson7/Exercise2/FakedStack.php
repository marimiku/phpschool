<?php
require_once __DIR__ . '\..\Exercise2\Queue.php';

class FakedStack
{
    private $queue1;
    private $queue2;

    public function __construct()
    {
        $this->queue1 = new Queue();
        $this->queue2 = new Queue();
    }

    public function push($value)
    {
        $this->queue1->enqueue($value);
    }

    public function pop()
    {
        if (!$this->queue1->isEmpty()) {

            $size = $this->queue1->getSize();
            while ($size > 1) {
                $this->queue2->enqueue($this->queue1->dequeue());
                $size--;
            }
            $popped = $this->queue1->dequeue();
            $temp = $this->queue2;
            $this->queue1 = $temp;
            $this->queue2 = new Queue();
            return $popped;
        }
        else {
            throw new Exception('Error: FakedStack is empty, unable to pop.');
        }
    }
}