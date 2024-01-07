<?php

echo "Hello, enter number from 1 to 6 : ";
$valueNumber = trim(fgets(STDIN));
$value = (int)$valueNumber;

echo match ($value) {
    1 => "The number {$value} is displayed in green colour. " . PHP_EOL,
    2 => "The number {$value} is displayed in red colour. " . PHP_EOL,
    3 => "The number {$value} is displayed in blue colour. " . PHP_EOL,
    4 => "The number {$value} is displayed in brown colour. " . PHP_EOL,
    5 => "The number {$value} is displayed in violet colour. " . PHP_EOL,
    6 => "The number {$value} is displayed in black colour. " . PHP_EOL,
    default => "You entered '{$valueNumber}', and it's not clear, so your color is white !" . PHP_EOL
};

