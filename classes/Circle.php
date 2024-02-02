<?php

class Circle extends Figure
{
    private int|float $radius;

    public function __construct(int|float $radius)
    {
        $this->setRadius($radius);
    }

    public function area() : int|float
    {
        return round( pi() * pow($this->getRadius(), 2), 2);
    }

    public function perimeter() : int|float
    {
        return round( 2 * pi() * $this->getRadius(), 2);
    }

    public function getPerimeter() : void
    {
        echo "The perimeter of a circle : " . $this->perimeter() . PHP_EOL;
    }

    public function getArea() : void
    {
        echo "The area of a circle : " . $this->area() . PHP_EOL;
    }

    /**
     * @param int|float $radius
     */
    public function setRadius(int|float $radius): void
    {
        if ($radius <= 0) {
            throw new Exception("Invalid radius");
        }
        $this->radius = $radius;
    }

    /**
     * @return int|float
     */
    public function getRadius() : int|float
    {
        return $this->radius;
    }



}