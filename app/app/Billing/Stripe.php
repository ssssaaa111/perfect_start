<?php
/**
 * Created by PhpStorm.
 * User: zunhui
 * Date: 2017/7/3
 * Time: 上午12:43
 */

namespace App\Billing;

//use App\Post;


use Illuminate\Support\Facades\App;

class Stripe
{
    /**
     * Strip constructor.
     */

    protected $key;

    public function __construct($key)
    {
        $this->key = $key;
    }
}