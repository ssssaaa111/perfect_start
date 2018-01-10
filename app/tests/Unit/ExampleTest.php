<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Post;

class ExampleTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {

        //given I have two records of posts,
        //each of one is posted a month apart
        Post::archive();

        $first = factory(Post::class)->create();

        $second = factory(Post::class)->create([
            'created_at'=>\Carbon\Carbon::now()->subMonth()
            ]
        );

        $post = Post::archive();

        $this->assertCount(2, $post);



        //when

        //then

    }
}
