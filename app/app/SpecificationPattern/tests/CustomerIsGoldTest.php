<?php

require 'vendor/autoload.php';

class CustomerIsGoldTest extends \PHPUnit\Framework\TestCase {
    public function is_gold(){
        $specification = new \app\SpecificationPattern\src\CustomerIsGold;
        $goldCustomer = new \app\SpecificationPattern\src\Customer("gold");
        $this->assertTrue($specification->isSatisfiedBy($goldCustomer));
    }
}

$test = new CustomerIsGoldTest;
$test->is_gold();
