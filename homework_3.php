<?php

echo "Hello, enter number from 1 to 6 : ";
$valueNumber = trim(fgets(STDIN));

echo match ($valueNumber) {
    "1" => "The number {$valueNumber} is displayed in green colour. " . PHP_EOL,
    "2" => "The number {$valueNumber} is displayed in red colour. " . PHP_EOL,
    "3" => "The number {$valueNumber} is displayed in blue colour. " . PHP_EOL,
    "4" => "The number {$valueNumber} is displayed in brown colour. " . PHP_EOL,
    "5" => "The number {$valueNumber} is displayed in violet colour. " . PHP_EOL,
    "6" => "The number {$valueNumber} is displayed in black colour. " . PHP_EOL,
    default => "You entered '{$valueNumber}', and it's not clear, so your color is white !" . PHP_EOL
};

