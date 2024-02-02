<?php

class Circle2
{
    private int|float $radius;

    public function __construct(int|float $radius)
    {
        $this->setRadius($radius);
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