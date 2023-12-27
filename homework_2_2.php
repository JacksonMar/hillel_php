<?php

// Цілі числа
$integer1 = 10;
$integer2 = "10";

echo "Цілі числа:\n";

echo "Суворе порівняння ($integer1 === $integer2): ";
var_dump($integer1 === $integer2);
echo "Несуворе порівняння ($integer1 == $integer2): ";
var_dump($integer1 == $integer2);
echo "\n";

// Строка
$string1 = "Hello";
$string2 = "World";

echo "Рядки:\n";
echo "Суворе порівняння ($string1 === $string2): ";
var_dump($string1 === $string2);
echo "Несуворе порівняння ($string1 == $string2): ";
var_dump($string1 == $string2);
echo "\n";

// Логічні значення
$bool1 = true;
$bool2 = "1";

echo "Bool:\n";
echo "Суворе порівняння ($bool1 === $bool2): ";
var_dump($bool1 === $bool2);
echo "Несуворе порівняння ($bool1 == $bool2): ";
var_dump($bool1 == $bool2);
echo "\n";

// Числа комою
$float1 = 5;
$float2 = 5.0;

echo "Float:\n";
echo "Суворе порівняння ($float1 === $float2): " . ($float1 === $float2);
var_dump($float1 === $float2);
echo "Несуворе порівняння ($float1 == $float2): ";
var_dump($float1 == $float2);
echo "\n";

// NULL
$null1 = null;
$null2 = 0;

echo "null:\n";
echo "Суворе порівняння ($null1 === $null2): ";
var_dump($null1===$null2);
echo "Несуворе порівняння ($null1 == $null2): " ;
var_dump($null1==$null2);
