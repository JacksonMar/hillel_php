<?php
function randArray(int $length, int $min = 1, int $max = 50): array
{
    $array = []; // array();
    for ($i = 0; count($array) < $length; $i++) {
        $array[] = rand($min, $max);  // rand - функція для генерацій рандомного значень.
    }
    return $array;
}

$randArray = randArray(5);


/*знаходить найбільший та найменший елемент масиву*/
$maxValue = $randArray[0];
$minValue = $randArray[0];
foreach ($randArray as $value) {
    if ($value > $maxValue) {
        $maxValue = $value;
    }
    if ($value < $minValue) {
        $minValue = $value;
    }
};
echo $maxValue . PHP_EOL;
echo $minValue . PHP_EOL;


/*- сортує масив та виводить його у відсортованому вигляді*/
$sortArray = [];
sort($randArray);
echo "Відсортований масив: ";
foreach ($randArray as $value) {
    $sortArray[] = $value;
}
var_dump($sortArray);