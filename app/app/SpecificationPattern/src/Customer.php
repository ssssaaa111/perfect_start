<?php


namespace App\SpecificationPattern\src;


class Customer
{
    protected $plan;

    /**
     * Customer constructor.
     * @param $plan
     */
    public function __construct($plan)
    {
        $this->plan = $plan;
    }

}