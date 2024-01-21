<?php

function fibonacciGenerator($maxValue)
{
    $a = 0;
    $b = 1;

    while ($a < $maxValue) {
        yield $a;
        $temp = $a + $b;
        $a = $b;
        $b = $temp;
    }
}

$maxValue = 100;
foreach (fibonacciGenerator($maxValue) as $fibonacciNumber) {
    echo $fibonacciNumber . PHP_EOL;
}



