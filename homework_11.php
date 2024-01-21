<?php


echo "Введіть аргументи для запису у файл (введіть 'end' для завершення вводу): ";
$arguments = [];

while (true) {
    $input = trim(fgets(STDIN));

    if ($input === 'end') {
        break;
    }

    $arguments[] = $input;
}


$file = 'log.txt';
file_put_contents($file, implode(' ', $arguments) . PHP_EOL, FILE_APPEND);

echo "Аргументи були успішно записані у файл '$file'.\n";


if (file_exists($file)) {
    $contents = file_get_contents($file);
    $argumentsArray = explode(' ', trim($contents));

    echo "Останні аргументи, які були введені:\n";
    foreach ($argumentsArray as $argument) {
        echo "$argument\n";
    }
} else {
    echo "Файл '$file' не знайдений.\n";
}