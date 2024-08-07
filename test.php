<?php
$password = "123456";
$salt = "b1c0227a01ceb0abbbc8e4569e303677";  // Сіль з вашого прикладу
$iterations = 1000;  // Кількість ітерацій PBKDF2 (зазвичай вказується окремо)

$hash = hash_pbkdf2("sha256", $password, $salt, $iterations, 32);  // 32 - довжина хешу

echo "Згенерований хеш-значення пароля: " . $hash;


