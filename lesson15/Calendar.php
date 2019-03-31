<?php

include_once "Event.php";

class Calendar
{
    private static $instance = null;
    private $calendar;
    private $timezone;
    private $events;

    public static function getInstance($calendarType, $timezone)
    {
        if (null === self::$instance) {
            self::$instance = new self($calendarType, $timezone);
        }
        return self::$instance;
    }

    protected function __construct($calendarType, $timezone)
    {
        $this->calendar = $calendarType;
        $this->timezone = $timezone;
        date_default_timezone_set($timezone);
        $this->events = [];
    }

    protected function __clone()
    {
    }

    public function today()
    {
        return date('l, jS \of F, Y');
    }

    public function showMonth(int $month, int $year = 0)
    {
        $space = str_repeat(' ', 3);
        $year = $this->setYear($year);
        return PHP_EOL . $this->weekDaysToString($space) . PHP_EOL . PHP_EOL
            . $this->daysOfMonth($space, $month, $year);
    }

    public function showYear(int $year = 0)
    {
        $result = '';
        $year = $this->setYear($year);
        for ($i = 1; $i <= 12; $i++) {
            $result .= PHP_EOL . PHP_EOL . date('F', mktime(0, 0, 0, $i, 0))
                . $this->showMonth($i, $year) . PHP_EOL;
        }
        return $result;
    }

    public function addEvent(string $msg, int $alertBefore, int $hours, int $minutes, int $day, int $month)
    {
        $event = new Event($msg, date('d.n.Y H:i', mktime($hours, $minutes, 0, $month, $day, date('Y'))), $alertBefore);
        array_push($this->events, $event);
        uasort($this->events, array($this, "sortEventsFunc"));
    }

    public function showEvents()
    {
        $result = '';
        foreach ($this->events as $event) {
            $result .= $event;
        }
        return strcmp($result, '') === 0 ? "Your event log is empty. \n" : $result;
    }

    private static function sortEventsFunc($event1, $event2)
    {
        if (strtotime($event1->getDatetime()) == strtotime($event2->getDatetime())) {
            return 0;
        }
        return (strtotime($event1->getDatetime()) > strtotime($event2->getDatetime())) ? 1 : -1;
    }

    private function setYear(int $year)
    {
        return $year = 0 ? intval(date('Y')) : $year;
    }

    private function weekDaysToString(string $space): string
    {
        $result = '';
        for ($i = 1; $i <= 7; $i++) {
            $result .= date('D', mktime(0, 0, 0, 0, $i, 0)) . $space;
        }
        return $result;
    }

    private function daysOfMonth(string $space, int $month, int $year)
    {
        $daysInMonth = date('t', mktime(0, 0, 0, $month, 0, $year));
        $weekdayOfFirst = date('N', mktime(0, 0, 0, $month, 1, $year));
        $result = '';
        $currentDayNumber = 1;
        for ($i = 1; $i < $weekdayOfFirst; $i++) {
            $result .= $space . $space;
        }

        for ($i = $weekdayOfFirst; $i <= 7; $i++) {
            $result .= ' ' . $currentDayNumber . ' ' . $space;
            $currentDayNumber++;
        }
        $result .= PHP_EOL;

        for ($i = $currentDayNumber - 1; $i <= $daysInMonth; $i++) {
            $result .= ($i > 9)
                ? ' ' . $i . $space
                : ' ' . $i . ' ' . $space;
            if (($i + $weekdayOfFirst) % 7 == 0) $result .= PHP_EOL;
        }
        return $result;

    }

}
