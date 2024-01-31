<?php

class SubClass
{
    public function printText() {
        $textToPrint = isset($this->text) ? strtoupper($this->text) : "some text";
        echo $textToPrint . PHP_EOL;
    }
}