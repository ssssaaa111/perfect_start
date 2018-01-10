<?php


namespace App;


class Book
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