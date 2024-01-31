<?php

require_once "classes/BankAccount2.php";

$card = new BankAccount2(123456789, 500);

var_dump($card->getBalanceCard());
var_dump($card->replenishmentCart(500));
try {
    var_dump($card->transferCash(-2000));
}catch (Exception){
    echo "Шось пішло не так" . PHP_EOL;
}
$card2 = new BankAccount2(1234567890, 1700);
$a = $card2->transaction($card, 1700);
var_dump($a);

var_dump($card->getBalanceCard());
