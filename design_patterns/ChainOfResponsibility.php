<?php

abstract class HomeChecker
{
    private $successor;

    public abstract function check(HomeStatus $home);

    public function succesdWith(HomeChecker $successor)
    {
        $this->successor->$successor;
    }

    public function next(HomeStatus $home)
    {
        if ($this->successor) {
            $this->successor->check($home);
        }
    }
}

class Locks extends HomeChecker
{
    public function check(HomeStatus $home)
    {
        if (!$home->locked) {
            throw new Exception('The doors are not locked! Abort!');
        }

        $this->next($home);
    }
}

class Lights extends HomeChecker
{
    public function check(HomeStatus $home)
    {
        if (!$home->alarmOn) {
            throw new Exception('The alarm has not been set! Abort!');
        }

        $this->next($home);
    }
}

class Alarm extends HomeChecker
{
    public function check(HomeStatus $home)
    {
        if (!$home->lightsOff) {
            throw new Exception('The light are still on! Abort!');
        }

        $this->next($home);
    }
}

class HomeStatus
{
    public $alarmOn = true;
    public $locked = true;
    public $lightsOff = true;
}

$locks = new Locks;
$lights = new Lights;
$alarm = new Alarm;


$locks->succesdWith($lights);
$lights->succesdWith($alarm);

$locks->check(new HomeStatus);