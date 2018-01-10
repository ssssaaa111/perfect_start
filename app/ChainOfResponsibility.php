<?php
/**
 * Created by PhpStorm.
 * User: zunhui
 * Date: 2017/7/29
 * Time: 下午5:21
 */
abstract class HomeChecker{
    protected $successor;

    abstract public function check(HomeStatus $home);

    public function succeedWith(HomeChecker $successor){
        $this->successor = $successor;
    }

    public function next(HomeStatus $home)
    {
        if($this->successor){
            $this->successor->check($home);
        }

    }
}

class Locks extends HomeChecker {
    public function check(HomeStatus $homeStatus)
    {
        if(! $homeStatus->Locked){
            throw new Exception("The door is opened, Abort, abort");
        }
        $this->next($homeStatus);

}
}
class Lights extends HomeChecker {

    public function check(HomeStatus $home)
    {
        // TODO: Implement check() method.
        if(! $home->lightsOff){
            throw new Exception("The lights is opened, Abort, abort");
        }

        $this->next($home);
    }
}

class Alarms extends HomeChecker {

    public function check(HomeStatus $home)
    {
        // TODO: Implement check() method.
        if(! $home->alarmsOn){
            throw new Exception("The alarm is offed, Abort, abort");
        }
        $this->next($home);
    }
}
class HomeStatus{
    public $alarmsOn = false;
    public $lightsOff = true;
    public $Locked = true;
}

$locks = new Locks;
$lights = new Lights;
$alarms = new Alarms;

$locks->succeedWith($lights);
$lights->succeedWith($alarms);


$status = new HomeStatus;
$locks->check($status);