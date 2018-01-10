<?php

/**
 * Created by PhpStorm.
 * User: zunhui
 * Date: 2017/7/27
 * Time: 上午1:48
 */
//require 'vendor\autoload.php';
//require_once 'BookInterface.php';
require_once "eReaderInterface.php";
//require_once "Kindle.php";
require_once "KindleAdaptor.php";

class Book implements BookInterface
{
    public function open()
    {
        var_dump("open the paper book!");
    }

    public function turnPage()
    {
        var_dump("turning the paper book");
    }
}

class Person
{
    public function read(BookInterface $book)
    {
        $book->open();
        $book->turnPage();

    }
}
(new Person)->read(new KindleAdaptor(new Kindle));