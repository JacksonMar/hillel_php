<?php


class BankAccount {
    private $accountNumber;
    private $balance;

    public function __construct($accountNumber, $initialBalance = 0) {
        $this->accountNumber = $accountNumber;
        $this->balance = $initialBalance;
    }

    public function getAccountNumber() {
        return $this->accountNumber;
    }

    public function getBalance() {
        return $this->balance;
    }

    public function deposit($amount) {
        if ($amount > 0) {
            $this->balance += $amount;
            echo "Deposited $amount into account {$this->accountNumber}. New balance: {$this->balance}\n";
        } else {
            echo "Invalid deposit amount. Please enter a positive value.\n";
        }
    }

    public function withdraw($amount) {
        if ($amount > 0 && $amount <= $this->balance) {
            $this->balance -= $amount;
            echo "Withdrew $amount from account {$this->accountNumber}. New balance: {$this->balance}\n";
        } else {
            echo "Invalid withdrawal amount. Please enter a positive value and ensure sufficient balance.\n";
        }
    }

    public function transfer($recipientAccount, $amount) {
        if ($amount > 0 && $amount <= $this->balance) {
            $this->balance -= $amount;
            $recipientAccount->deposit($amount);
            echo "Transferred $amount from account {$this->accountNumber} to account {$recipientAccount->getAccountNumber()}\n";
            echo "Sender's new balance: {$this->balance}\n";
        } else {
            echo "Invalid transfer amount. Please enter a positive value and ensure sufficient balance.\n";
        }
    }
}
