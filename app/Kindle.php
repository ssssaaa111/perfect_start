<?php


class Kindle implements eReaderInterface
{
    public function turnOn()
    {
       return "turn the kindle on";
    }

    public function pressNextBotton()
    {
        return "press the button";
    }
}