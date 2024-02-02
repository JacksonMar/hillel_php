<?php

class Controller
{
    public function max(string $string, int $max): bool
    {
        echo 'max in parent class';
        return true;
   }
}