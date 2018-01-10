<?php
/**
 * Created by PhpStorm.
 * User: zunhui
 * Date: 2017/7/4
 * Time: 上午10:55
 */

namespace App\Repositories;

use App\Post;
use App\Redis\Redis;

class Posts
{

    /**
     * Posts constructor.
     */

    protected $redis;

    /**
     * Posts constructor.
     * @param $redis
     */
    public function __construct(Redis $redis)
    {
        $this->redis = $redis;
    }


    public function all()
    {
        return Post::all();
    }

}