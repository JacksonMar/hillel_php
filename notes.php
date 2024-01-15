<?php

$name = "Jack";

$number_one = 5;
$number_two = 10;

$result = $number_one ** $number_two;

echo $result . PHP_EOL;

echo $name . PHP_EOL;

// PHP_EOL == \n

$number_three = 23;
$number_fore = "2";

$notAnExplicitCast = $number_three + $number_fore;
echo $notAnExplicitCast . PHP_EOL;


// ===================================================
/*
Наступні значення є FALSE при перетворенні
на bool:
● FALSE;
● 0 , -0;
● 0.0, -0.0;
● ‘’, ‘0’;
● пустий масив;
● NULL;
*/
// ===================================================


$hello = "Hi, what's your name?";

echo $hello . PHP_EOL;

$userName = trim(fgets(STDIN));
var_dump($userName);
/*
fgets - функція вводу
STDIN - данні беремо з терміналу
trim - прибирає зайві пробіли та переносу рядка
*/

var_dump(10 > 5);


$q = "========================= if/else =========================" . PHP_EOL;
echo $q;
/*
if ($змінна) {
    умова
}

if - тільки фолс або тру !
 */

$variableForIf = false;
$statusCode = 200;
if ($statusCode) {
    echo 'This\'s TUK-TIK' . PHP_EOL;   // \' - єкранізація
    }
elseif ($statusCode === 200){
    echo "This's norm status code {$statusCode} from elseif" . PHP_EOL;
}
elseif ($statusCode === 404){
    echo "This's bad status code {$statusCode} from elseif" . PHP_EOL;
}
    else {
        echo "This is TUK-TUK - false from else" . PHP_EOL;
    }
// В чому прикладі (if/elseif/els) якшо одна умава виконуєтся - інши варіанти не перевіряются !

switch ($statusCode){
    case 200:
        echo "This's norm status code {$statusCode} from switch" . PHP_EOL;
        break;
    case 404:
        echo "This's bad status code {$statusCode} from switch" . PHP_EOL;
        break;
    default:
        echo "=========== + _ + ===========" . PHP_EOL;
}

//     switch більш нова функція, обовязково повинен бути break. Якшо його не буда - код піде відпрацовувати далі.
// Другий момент, в switch виконуєтся НЕ СУВОРЕ порівняння. Тобто "200" == 200

$statusCodeMatch = 500;
echo match ($statusCodeMatch){
    404 =>  "This's norm status code {$statusCodeMatch} from match" . PHP_EOL,
    200 => "This is norm status code {$statusCodeMatch} from match" . PHP_EOL,
    default => "Something's wrong from match" . PHP_EOL
};

//      match - ще одна конструкція натшталт if/else. ПЕРЕВАГА - СУВОРЕ ПОРІВНЯННЯ, по значеню та по типу.


echo "========================== STR ==========================" . PHP_EOL;
$somSrt = "Die rashka";

echo strlen($somSrt) . PHP_EOL; // strlen - кількість символів в рядку

$hello = "Hello {user_name} !!!" . PHP_EOL;
$hello = str_replace('{user_name}', $userName, $hello); // str_replace - заміна. '{user_name}' - шо міняємо,
//                                                           $userName - на ЩО міняємо, $hello - де саме змінюємо.
$hello2 = "Hello my {user_name} !?" . PHP_EOL;
$hello2 = str_replace(['{user_name}', '?'], [$userName, '! --> !'], $hello2);
echo $hello;
echo $hello2;
$banlist = ["{a}", "{b}", "{c}"];
$sonText = "Dich {a}, will be {b}, in {c} !" . PHP_EOL;
$sonText = str_replace($banlist, "***", $sonText);
echo $sonText;
$stringHello = "   Hello world. My name is Jeckson. Som text in test.    " . PHP_EOL;
$pos = strpos($stringHello, "."); // strpos - Показує позицію символа "." по першему входженню.
if ($pos !== false){
    $stringHello2 = substr($stringHello, 0, $pos +1) . PHP_EOL;
}; // $pos !== false - суворе порівняння, тому шо с початку може стояти пробел " " і тоді вс ломаєтся.
// substr - вирізає рядок з рядку. $stringHello - вхідна сторока, "offset:0" - скільки нам потрібно пропустити символів,
// $pos - довжина радка яка повинна бути, (тут ми рохуємо за допомогою "strpos").
echo $stringHello2;
if ($pos !== false){
    $stringHello = substr($stringHello, $pos + 2, strlen("My name is Jeckson.") ) . PHP_EOL;
};
echo $stringHello;
$stringHello3 = ".Hello world. My name is Jeckson. Som text in test -> trim.";
$stringHello3 =  trim($stringHello3, "."); // trim - прибирає зайві отступи с початка та с кінця.
// Можно задати символ. ltrim - твльки з ліво, rtrim - тільки з право.
echo  $stringHello3 . PHP_EOL;
$stringHello3 = strtoupper($stringHello3); // strtoupper - весь рядок у верхній регістр.
echo $stringHello3 . PHP_EOL;
$stringHello3 = strtolower($stringHello3); // strtolower - весь рядок у нижній регістр.
echo $stringHello3 . PHP_EOL;

$url = "?name=Jack&mail=test@test.ua&age=25";
$result = [];
parse_str($url, $result); // parse_str - парсит урл та перетворює на масив.  $url - строку яку парсимо,
//                              $result - куди записуємо резалт.
var_dump($result); // var_dump() - виводимо результат, зміст змінной.

echo str_ireplace("hello", "Dich" ,$hello); // str_ireplace - змінює в не залежності від регістра.


echo "============================== FUNCTIONS ============================== " . PHP_EOL;

function myFunction() : void
{
    echo "My first function!" . PHP_EOL;
}
myFunction();

function mySecondFunction($name) : void
{
    echo "My second function --> $name!" . PHP_EOL;
}

mySecondFunction("test");


//declare(strict_types=1);  - включаєтся на початку файла. Включає строгий вхід-вихід змінних (string $name= "Jackson").
//               Якшо змінна $name буде НЕ строка - ERROR/ КОНТРОЛЮЄМО ТИПИ ЯКІ МИ ПЕРЕДАЄВ В ЗМІННІ.



function myThirdFunction(string $name= "Jackson", string|null $message=null) : string // void - якшо функція не чого не повертає.
{
//    global $url; // global - виклик глобальной змінной
//    echo $url . PHP_EOL;

    print_r(func_get_args()); // func_get_args - вивобить усі зміння які були передані до функцій.

    $string = "Hello  --> $name!";
    if(isset($message)){   // isset - перевіряю якшо змінна або функція встановленна.
        $string .= $message . PHP_EOL;
    };
    echo $string . PHP_EOL;
    return $string;
}

myThirdFunction($name="Boby", $message=" Howe are you?");
myThirdFunction("Bich", "Where are you?");
myThirdFunction(1,2,3,4,5);
$mars = myThirdFunction(name: "Jim", message: "BooooM");


function showNumbers(...$numbers) // якшо ми не хочемо встановлювати конкретну кількість змінних
{
    var_dump($numbers); // сюди прийде array зі всіми параметрами
}
showNumbers(1,2,3,4,5,6);

function counter()
{
    static $counter = 0;  // робимо статичну змінну, виклик функцій зберігаєтся.
    $counter ++;
    echo $counter . PHP_EOL;
}
counter();
counter();
counter();


$anonymousFunction = function (){   // анонімна функція, можно пережавати зміні, та можно їй передавати в якості аргумента.
    return "I am anonymous function !!!" . PHP_EOL;
};

var_dump($anonymousFunction());


function myFilter(string $text, callable $function = null)  // callback - функція яка передаєтся в якості аргумента.
{
    if (is_callable($function)){
        $text = $function($text);
    }
    return $text;
}
$text = "     \n   Hello mather fucka  !!</p><p>   ";
$text = myFilter($text, "trim");
$text = myFilter($text, "strip_tags"). PHP_EOL;
$text = myFilter($text, $anonymousFunction);
echo $text;

// Closure - всі анонимні функцій
// callable - всі функцій

$number = 2;
$functionNumber = function ($number1, $number2) use ($number){  // use ($number) - берем тільки значеня з $number = 2,
    //                                                              та саму змінну $number не змінюємо.
    $number = $number1 * $number2;
    echo $number . PHP_EOL;
};

$functionNumber(5,7);
echo $number . PHP_EOL;


$closure = fn($c) => 5 * $c; // стрілочка функція, fn($c) - обозначаем функцію та передаєм аргумент $c,
//                              після => все шо повинно повернути.
echo $closure(10) . PHP_EOL;
$text = "Hello !!!!";



echo "============================== ARRAY ==============================" . PHP_EOL;


$array = [1 => "element_1", 2 => "element_2", "text" => 100];
var_dump($array);
$array[0] = "element_0"; // додаємо в масив
$array[3] = "array_test";
var_dump($array);

if (isset($array[1])){    // перевіряємо існує ключ чи ні, якшо да - виводимо значення.
    var_dump($array[1]);
}

unset($array[2]);  // видалення ключ значення з масиву.

$array[] = "on the and of array";  // додаваня в кінець масиву.

$array1 = [1,2,3];
$array2 = [4,5,6];
$array3 = $array2 + $array1;  // КЛЮЧИ ОДНАКОВІ, тому один масив затре другий.
var_dump($array3);

$array = ["dich", ...$array3]; // додавайня в середену масива
var_dump($array);


echo "============================== WHILE ==============================" . PHP_EOL;

$i = 0;
while ($i <= 10){    // якшо умова не виконуєтся, цикл навіть на запустится. while - перевіряє потім робить.
    echo $i . PHP_EOL;
    $i++;
}
//  DO WHILE
$i = 0;
do {
    echo $i . PHP_EOL; // якшо умова не виконуєтся, то виконаєтся 1 раз. do while - робить потім перевіряє.
    $i ++;
} while($i<=10);

// FOREACH
foreach ($array as $key => $value) {
    echo "$key => $value" . PHP_EOL;
    if ($key == 3) {
        $array[$key] = $value * 30; //  $array[$key] - достаємо конкретний ключ та перезаписуємо $value * 3
        echo "$key => $value" . PHP_EOL;
    }
};
var_dump($array);

// FOR
for ($i = 0; $i <= 10; $i++)  // $i=0 - змінна яка використовуєтся в якості лічильника, $i<=10 - умова поки буде робити цикл,
    //                       $i++ - вираз який змінює значення лічильника.
{
    echo $i . PHP_EOL;
}

$length = count($array);
for ($i = 0; $i < $length; $i++) {
    echo $array[$i] . PHP_EOL;
};

echo array_key_last($array) . PHP_EOL; // повертає остане КЛЮЧ в масиві.


echo "==========================================================" . PHP_EOL;

function randArray(int $length, int $min = 1, int $max = 50): array
{
    $array = []; // array();
    for ($i = 0; count($array) < $length; $i++) {
        $array[] = rand($min, $max);  // rand - функція для генерацій рандомного значень.
    }

    return $array;
}

$randArray= randArray(5);
$sum = array_sum($randArray);  // array_sum - виводить суму усіх чисел в масиві.
echo $sum . PHP_EOL;
$array_key_last = array_key_first($randArray); // array_key_first - повертає перший ключ.
