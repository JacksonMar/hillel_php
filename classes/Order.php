<?php

class Order
{
    private array $items = [];

    private ?DiscountInterface $discount = null;

    public function __construct(array $items, ?DiscountInterface $discount = null)
    {
        $this->setItems($items);
        $this->setDiscount($discount);
    }

    /**
     * @param array $items
     */
    public function setItems(array $items): void
    {
        foreach ($items as $item) {
            if (!isset($item['name'], $item['price'], $item['amount'])) {
                throw new Exception("Invalid item structure");
            }

            if ($item['price'] <= 0 || $item['amount'] <= 0) {
                throw new Exception("Invalid price or amount for item");
            }
        }
        $this->items = $items;
    }

    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }

    public function calculateTotal(): float
    {
        $total = 0;
        $items = $this->getItems();
        foreach ($items as $item) {
            $total += $item['price'] * $item['amount'];
        }

        if (isset($this->discount)) {
            $total = $this->getDiscount()->applyDiscount($total);
        }

        return $total;
    }

    /**
     * @param DiscountInterface|null $discount
     */
    public function setDiscount(?DiscountInterface $discount): void
    {
        $this->discount = $discount;
    }

    /**
     * @return DiscountInterface|null
     */
    public function getDiscount(): ?DiscountInterface
    {
        return $this->discount;
    }
}