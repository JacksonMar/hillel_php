<?php

class FixedDiscount implements DiscountInterface
{

    private float $discount;
    private float $limit;



    public function __construct(float $discount, float $limit)
    {
        $this->setLimit($limit);
        $this->setDiscount($discount);

    }
    /**
     * @param float $total
     * @return float
     */
    public function applyDiscount(float $total): float
    {
        if ($total >= $this->getLimit()){
            $total -= $this->getDiscount();
        }
        return $total;
    }

    /**
     * @param float $discount
     */
    public function setDiscount(float $discount): void
    {
        if ($discount <= 0) {
            throw new Exception("Invalid Discount");
        }
        $this->discount = $discount;
    }

    /**
     * @param float $limit
     */
    public function setLimit(float $limit): void
    {
        if ($limit <= 0){
            throw new Exception("Invalid Limit");
        }
        $this->limit = $limit;
    }

    /**
     * @return float
     */
    public function getDiscount(): float
    {
        return $this->discount;
    }

    /**
     * @return float
     */
    public function getLimit(): float
    {
        return $this->limit;
    }


}