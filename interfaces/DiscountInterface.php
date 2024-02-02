<?php


interface DiscountInterface // інтерфейс тільки задає абстракцію. Тут тільки можуть бути абстрактні методи.
{
    public function applyDiscount(float $total): float;
}

// інтерфейс задає як код повинен вести.