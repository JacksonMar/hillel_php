<?php



class PercentageDiscount implements DiscountInterface // implements - підключає інтерфейс, можно вказувати декілька інтерфейсів.
{
    private int $percentage;

    private ?float $limit = null;

    public function __construct(int $percentage, ?float $limit = null)
    {
        $this->setPercentage($percentage);
        $this->setLimit($limit);
    }

    /**
     * @param float $total
     * @return float
     */
    #[\Override] public function applyDiscount(float $total): float
    {
        $limit = $this->getLimit();
        if (isset($limit) && $total < $limit) {
            return $total;
        }

        return $total - $total * ($this->getPercentage() / 100);
    }

    /**
     * @param int $percentage
     */
    public function setPercentage(int $percentage): void
    {
        if ($percentage <= 0 || $percentage > 100) {
            throw new Exception('Invalid percentage');
        }
        $this->percentage = $percentage;
    }

    /**
     * @return int
     */
    public function getPercentage(): int
    {
        return $this->percentage;
    }

    /**
     * @param float|null $limit
     */
    public function setLimit(?float $limit): void
    {
        if (isset($limit)) {
            if ($limit <= 0) {
                throw new Exception('Invalid limit');
            }
            $this->limit = $limit;
        }
    }

    /**
     * @return float|null
     */
    public function getLimit(): ?float
    {
        return $this->limit;
    }
}