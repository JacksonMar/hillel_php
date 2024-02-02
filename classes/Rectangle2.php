<?php

require_once "Figure.php";
class Rectangle2
{
    use GeometryTrait;

    private int|float $length;
    private int|float $width;

    public function __construct(int|float $length, int|float $width)
    {
        $this->setLength($length);
        $this->setWidth($width);

    }


    /**
     * @param int|float $length
     */
    public function setLength($length): void
    {
        if ($length <= 0 ) {
            throw new Exception("Invalid length");
        }
        $this->length = $length;
    }

    /**
     * @param int|float $width
     */
    public function setWidth($width): void
    {
        if ($width <= 0 ) {
            throw new Exception("Invalid width");
        }
        $this->width = $width;
    }

    /**
     * @return int|float
     */
    public function getLength() : int|float
    {
        return $this->length;
    }

    /**
     * @return int|float
     */
    public function getWidth() : int|float
    {
        return $this->width;
    }

}