<?php
// Перевіряємо метод HTTP-запиту
$method = $_SERVER['REQUEST_METHOD'];

// Якщо метод - GET
if ($method === 'GET') {
    // Виводимо привітання
    echo "<h2><p>Привітальне повідомлення =)))!</p></h2>";
}
// Якщо метод - POST
elseif ($method === 'POST') {
    // Перевіряємо, чи передані обидва числа
    if (isset($_POST['number1']) && isset($_POST['number2'])) {
        // Отримуємо передані числа і фільтруємо їх
        $number1 = filter_input(INPUT_POST, 'number1', FILTER_VALIDATE_FLOAT);
        $number2 = filter_input(INPUT_POST, 'number2', FILTER_VALIDATE_FLOAT);

        // Перевіряємо, чи передані значення є числами
        if ($number1 !== false && $number2 !== false) {
            // Виконуємо операцію складання чисел
            $result = $number1 + $number2;
            // Виводимо результат
            echo "<p>Результат складання: $result</p>";
        } else {
            // Якщо передані значення не є числами, виводимо повідомлення про помилку
            echo "<p>Помилка: передані значення повинні бути числами</p>";
        }
    } else {
        // Якщо не передані обидва числа, виводимо повідомлення про помилку
        echo "<p>Помилка: не вистачає одного або обох чисел</p>";
    }
}
