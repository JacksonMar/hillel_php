<?php

/*1. Написати програму на PHP, яка містить користувацьку функцію для обчислення площі кола та демонструє використання
передачі даних у функцію за допомогою параметрів.*/
function circleArea(int|float $r) : int|float
{
    $pi = 3.14;
    $area = $pi*($r** 2);
    return $area;
}
$circleArea = circleArea(5);
echo $circleArea . PHP_EOL;


$number = 5;
/*2. Написати програму на PHP, яка приймає число і підносить його до ступеню*/
function numberPower(int|float $i, int $power=2) : int|float
{
    $i = $i ** $power;
    return $i;
}
var_dump(numberPower($number,3));
echo $number . PHP_EOL;


/*3. Використайте функцію в двох варіантах: коли вона повертає нове число і змінює передане.*/
function numberPower2(int|float &$i, $power) : void
{
    $i = $i ** $power;
}
$a = numberPower2($number,5);
echo $number . PHP_EOL;