<?php
/*Виведіть на екран всі числа від 1 до 10 використовуючи цикл while*/
while ($i <= 10){
    echo $i . PHP_EOL;
    $i++;
}

/*Обчисліть факторіал числа 5 використовуючи цикл while.*/
$number = 5;
$factorial = 1;
$i = 1;

while ($i <= $number) {
    $factorial *= $i;
    $i++;
}
echo $factorial . PHP_EOL;

/*Виведіть на екран всі парні числа від 1 до 20 використовуючи цикл while.*/
$evenNumbers = [];
$i = 0;
while ($i <= 20) {
    if ($i % 2 == 0) {
        $evenNumbers[] = $i;
        echo $i .PHP_EOL;
    }
    $i++;
}

//var_dump($evenNumbers);