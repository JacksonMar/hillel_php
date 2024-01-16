<?php
function randomArray(): array
{
    $randomArray = [];
    $somLength = rand(1, 10);
    for ($i = 0; $i < $somLength; $i++) {
        $randomArray[] = rand(0, 50);
    }
    return $randomArray;
}

$randomArray = randomArray();
var_dump($randomArray);


/*Порахувати суму елементів масиву.*/
$sum = 0;
foreach ($randomArray as $key => $value) {
    $sum = $value + $sum;
};
echo "Сума : " . $sum . PHP_EOL;


/*Порахувати добуток всіх елементів масиву.*/
$calculate = 1;
$i = 0;
do {
    $calculate *= $randomArray[$i];
    $i++;
} while ($i < count($randomArray));
echo "Добуток : " . $calculate . PHP_EOL;

//foreach ($randomArray as $value) {
//    $calculate *= $value;
//};
//echo $calculate . PHP_EOL;


/*Перевірте скільки раз число 5 зустрічається у вас в масиві.*/
$counter = 0;
$i = 0;
while ($i < count($randomArray)) {
    if ($randomArray[$i] === 5) {
        $counter = $counter + 1;
    }
    $i++;
}
echo "Число 5 зустрічається : " . $counter . PHP_EOL;


/*Виведіть на екран тільки числа, які націло діляться на 3.*/
for ($i = 0; $i < count($randomArray); $i++) {
    if ($randomArray[$i] % 3 === 0) {
        echo $randomArray[$i] . " -- діляться на 3" . PHP_EOL;
    }
}