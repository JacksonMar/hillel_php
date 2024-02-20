<?php

$name = $_POST['name']; // $_POST - глобальна змінна для отримання POST запиту
$email = $_POST['email'];
$number = intval($_POST['age']);
$description = strip_tags($_POST['description']);

$email = filter_var($email, FILTER_SANITIZE_EMAIL);

//if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//    echo "Invalid Email";
//    exit;
//}

if (!preg_match('/[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}/', $email, $matches)) {
    // preg_match - це регулярка, приймає патерн, потім тіло
    echo "Invalid Email";
    exit;
}

file_put_contents('test.txt', $description);
echo $name . "<br>";
echo $email . "<br>";
echo $number . "<br>";
echo htmlspecialchars_decode($description) . "<br>";
