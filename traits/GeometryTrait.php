<?php


trait GeometryTrait {

//    private int|float $length;
//    private int|float $width;

    public function calculateRectangleArea($length, $width) : int|float
    {
        return $length * $width;
    }

    public function calculateCircleArea(int|float $radius) : int|float
    {
        return pi() * pow($radius, 2);
    }

    public function calculateRectanglePerimeter($length, $width) : int|float
    {
        return $length * $width;
    }

    public function calculateCirclePerimeter(int|float $radius) : int|float
    {
        return round( 2 * pi() * $radius, 2);

    }



}