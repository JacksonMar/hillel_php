<?php

$name = "Jack";

$number_one = 5;
$number_two = 10;

$result = $number_one ** $number_two;

echo $result . PHP_EOL;

echo $name . PHP_EOL;

// PHP_EOL == \n

$number_three = 23;
$number_fore = "2";

$notAnExplicitCast = $number_three + $number_fore;
echo $notAnExplicitCast . PHP_EOL;


// ===================================================
/*
Наступні значення є FALSE при перетворенні
на bool:
● FALSE;
● 0 , -0;
● 0.0, -0.0;
● ‘’, ‘0’;
● пустий масив;
● NULL;
*/
// ===================================================


$hello = "Hi, what's your name?";

echo $hello . PHP_EOL;

$userName = trim(fgets(STDIN));
/*
fgets - функція вводу
STDIN - данні беремо з терміналу
trim - прибирає зайві пробіли та переносу рядка
*/