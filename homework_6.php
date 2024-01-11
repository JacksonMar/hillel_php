<?php

function someFunction(int $number, int $numberTwo, ?Closure $function = null)
{
    $result = $number * $numberTwo;
    if (is_callable($function)){
        $function($result);
    }
    return $result;
}

$anonymous = function ($text){
    echo $text;
};

echo someFunction(5, 3, $anonymous("Result is : ")) . PHP_EOL;
echo someFunction(7, 3) . PHP_EOL;