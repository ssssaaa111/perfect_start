<?php


namespace App\TemplateDesignMethodPattern\src;


class  VeggieSub extends Sub
{
    protected function addPrimaryToppings()
    {
        var_dump("add some Veggie");
        return $this;
    }
}