<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function index(Tag $tag)
    {
        $posts = $tag->posts;
        $test = "Hello World, this is a coding process!";
        $test = "Hello World, this is a coding process!";
        $test = "Hello World, this is a coding process!";
        $test = "Hello World, this is a coding process!";
        $test = "Hello World, this is a coding process!";
        $test = "Hello World, this is a coding process!";
        return view('posts.index', compact('posts'));
    }

}

