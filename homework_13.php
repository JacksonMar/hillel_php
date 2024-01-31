<?php

require_once "classes/BankAccount.php";



$account1 = new BankAccount("12345", 1000);
$account2 = new BankAccount("67890", 500);

echo "Account {$account1->getAccountNumber()} balance: {$account1->getBalance()}\n";
echo "Account {$account2->getAccountNumber()} balance: {$account2->getBalance()}\n";

$account1->deposit(200);
$account1->withdraw(50);

$account1->transfer($account2, 100);

echo "Account {$account1->getAccountNumber()} balance: {$account1->getBalance()}\n";
echo "Account {$account2->getAccountNumber()} balance: {$account2->getBalance()}\n";
