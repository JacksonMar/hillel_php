<?php

require_once "classes/Rectangle.php";
require_once "classes/Figure.php";
require_once "classes/Circle.php";


$rectangle = new Rectangle(3, 7);
var_dump($rectangle);
$rectangle->getArea();
$rectangle->getPerimeter();

$circle = new Circle(8);
$circle->getArea();
$circle->getPerimeter();

