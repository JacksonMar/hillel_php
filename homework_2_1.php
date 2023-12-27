<?php

$hello = "Hi, what's your name?";

echo $hello . PHP_EOL;

$userName = trim(fgets(STDIN));

echo "Привіт, $userName!" . PHP_EOL;
echo "Рад вас бачити, $userName". "!" . PHP_EOL;

echo "Введить перше число : ";
$numberOne = (fgets(STDIN));

echo "Введить друге число : ";
$numberTwo = (fgets(STDIN));

$sumResult = $numberOne + $numberTwo;
$arithmeticMean = $sumResult/2;

echo "Сума чисел буде : $sumResult" . PHP_EOL . "A середня арифметичне буде : $arithmeticMean" . PHP_EOL;




