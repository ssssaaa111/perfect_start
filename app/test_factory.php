<?php
/**
 * Created by PhpStorm.
 * User: zunhui
 * Date: 2017/7/27
 * Time: 上午12:47
 */
interface CarService{
    public function getCost();
    public function getDesc();
}

class BasicInspection implements CarService {
    public function getCost()
    {
        return 10;
        
    }

    public function getDesc()
    {
        // TODO: Implement getDesc() method.
        return "Basic Inspection";
    }
}

class OilChange implements CarService {

    protected $carService;

    /**
     * OilChange constructor.
     * @param $carService
     */
    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }


    public function getCost()
    {
        // TODO: Implement getCost() method.
        return 25+$this->carService->getCost();
    }

    public function getDesc()
    {
       return $this->carService->getDesc()."OilChange";
    }
}

class TireRotation implements CarService {

    protected $carService;

    /**
     * OilChange constructor.
     * @param $carService
     */
    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }


    public function getCost()
    {
        // TODO: Implement getCost() method.
        return 25+$this->carService->getCost();
    }

    public function getDesc()
    {
        // TODO: Implement getDesc() method.
        return $this->carService->getDesc()."TireRotate";
    }
}


echo (new TireRotation(new OilChange(new BasicInspection())))->getDesc();
