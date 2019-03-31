<?php

class Event
{
    private $msg;
    private $datetime;
    private $alertBefore;

    public function __construct(string $msg, string $datetime, int $alertBefore)
    {
        $this->msg = $msg;
        $this->datetime = $datetime;
        $this->alertBefore = $alertBefore;
    }

    public function __toString()
    {
        return PHP_EOL . 'Event with message \'' . $this->msg . '\'' . ' for ' . $this->datetime;
    }

    public function getDatetime(): string
    {
        return $this->datetime;
    }

}