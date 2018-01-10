<?php
/**
 * Created by PhpStorm.
 * User: zunhui
 * Date: 2017/7/28
 * Time: 上午12:54
 */
require "Kindle.php";
require "BookInterface.php";

class KindleAdaptor implements BookInterface {

    private $kindle;

    /**
     * KindleAdaptor constructor.
     * @param $kindle
     */
    public function __construct(Kindle $kindle)
    {
        $this->kindle = $kindle;
    }


    public function open()
    {
        // TODO: Implement open() method.
        return $this->kindle->turnOn();
    }

    public function turnPage()
    {
        // TODO: Implement turnPage() method.
        return $this->kindle->pressNextBotton();
    }
}