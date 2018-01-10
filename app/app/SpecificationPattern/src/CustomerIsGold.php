<?php


namespace App\SpecificationPattern\src;


class CustomerIsGold{
    public function isSatisfiedBy(Customer $customer)
    {
        $customer->type = "gold";
    }
}