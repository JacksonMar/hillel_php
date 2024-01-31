<?php

class BaseClass
{
    protected $text = "some text";

    public function printText() {
        echo ucfirst($this->text) . PHP_EOL;
    }
}