<?php


class Node
{
    public $value;
    public $next;

    public function link($value, $next)
    {
        $this->value = $value;
        $this->next = $next;
    }
}