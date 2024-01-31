<?php

class BankAccount2
{
    private int $balanceCard;
    private int $cartNumber;

    public function __construct(int $cartNumber, float $balanceCard)
    {
        $this->setCartNumber($cartNumber);
        $this->setBalanceCard($balanceCard);
    }

    public function replenishmentCart(int|float $amount)
    {
        if ($amount < 0) {
            throw new Exception("Amount < 0");
        } else {
            $currentBalance = $this->getBalanceCard();
            $this->setBalanceCard($currentBalance + $amount);
        }
        return $this->getBalanceCard();
    }

    public function transferCash(int| float $amount)
    {
        if ($amount <= 0) {
            throw new Exception("You cannot withdraw cash. ");
        }
        elseif ( $this->balanceCard <= $amount) {
            throw new Exception("Insufficient funds in the account");
        }
        else {
            $currentBalance = $this->getBalanceCard();
            $this->setBalanceCard($currentBalance - $amount);
        }
        return $this->getBalanceCard();
    }

    public function transaction(BankAccount2 $recipientCard, int|float $senderAmount)
    {
        if ($senderAmount > 0
        && $this->getBalanceCard() >= $senderAmount
        ) {
            $this->setBalanceCard($this->getBalanceCard() - $senderAmount);
            $recipientCard->replenishmentCart($senderAmount);
        } else {
            throw new Exception("Something wrong");
        }
        return $this->getBalanceCard();
        }


    /**
     * @param int $cartNumber
     */
    public function setCartNumber(int $cartNumber): void
    {
        $this->cartNumber = $cartNumber;
    }

    /**
     * @param int $balanceCard
     */
    public function setBalanceCard(int $balanceCard)
    {
        if ($balanceCard < 0) {
            throw new Exception(" Invalid balance cart");
        }
        $this->balanceCard = $balanceCard;
        return $balanceCard;
    }

    /**
     * @return int
     */
    public function getCartNumber(): int
    {
        return $this->cartNumber;
    }

    /**
     * @return int
     */
    public function getBalanceCard(): int
    {
        return $this->balanceCard;
    }

}