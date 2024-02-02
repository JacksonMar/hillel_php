<?php

require_once "traits/GeometryTrait.php";
require_once "classes/Rectangle2.php";
require_once "classes/Circle2.php";

$rectangle = new Rectangle2(4, 7);
$a = $rectangle->calculateRectangleArea(4, 7);
var_dump($a);
$b = $rectangle->calculateCircleArea(4);
var_dump($b);
$c = $rectangle->calculateRectanglePerimeter(4,7);
var_dump($c);
$d = $rectangle->calculateCirclePerimeter(7);
var_dump($d);
