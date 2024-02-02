<?php


trait Validator    // trait - ключове слово для створеня трейду
{
    private string $test = 'test';
    public function max(string $string, int $max): bool
    {
        echo __TRAIT__ . PHP_EOL;
        if (strlen($string) > $max) {
            return false;
        }
        echo "AAAAAAAA". PHP_EOL;
        return true;
    }

    private function min(string $string, int $min): bool
    {
        if (strlen($string) < $min) {
            return false;
        }

        return true;
    }
}