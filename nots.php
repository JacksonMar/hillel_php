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

//$userName = trim(fgets(STDIN));
//var_dump($userName);
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
$userName = "Jack";
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
$array_key_first = array_key_first($randArray) . PHP_EOL; // array_key_first - повертає перший ключ.
$array_key_last = array_key_last($randArray) . PHP_EOL; // повертає остане КЛЮЧ в масиві.
echo $array_key_first;
echo $array_key_last;


$key = ["sky", "son", "grass"];
$value = ["blue", "green", "yellow"];
$somArray = [];
for ($i = 0; $i < count($key); $i++) {
    $somArray[$key[$i]] = $value[$i];
}
var_dump($somArray);
$arrayCombine = array_combine($key, $value);  // array_combine - перетворює з 2-х листів 1 дікт.
//                                              Обєднує в один масив по ключ-значення.

var_dump(array_keys($arrayCombine)); // array_keys - виводить усі улючі.
var_dump(array_values($arrayCombine)); // array_values - виводить усі значення.
var_dump(array_flip($arrayCombine)); // array_flip - міняє місцями ключ - значення.

echo "==========================================================" . PHP_EOL;

function calculate(int|float $number1, int|float $number2)
{
    $product = $number1 * $number2;
    $sum = $number1 + $number2;
    $minus = $number1 - $number2;
    return [$product, $sum, $minus];
}

$calculateResult = calculate(9, 5);
$product = $calculateResult[0]; // так можно загоняти значення функій в змінні.
$sum = $calculateResult[1];
$minus = $calculateResult[2];

list($product2, $sum2, $minus2) = calculate(5, 2);  // так можно загоняти значення функій в змінні.
[$product2, $sum2, $minus2] = calculate(5, 2);  // так можно загоняти значення функій в змінні.

echo $product . PHP_EOL;
echo $sum . PHP_EOL;
echo $minus . PHP_EOL;

echo $product2 . PHP_EOL;
echo $sum2 . PHP_EOL;
echo $minus2 . PHP_EOL;

echo "==========================================================" . PHP_EOL;
$name = "Lusi, Jim, Marta";

$arrayNames = explode(", ", $name); // explode - розбиває на масив. ", " - по якому признаку робвиваємо.
//                                              $name - яку строку розбиваємо.
var_dump($arrayNames);
$stringName = implode("!", $arrayNames); // implode - зєднує масив в строку по признаку ("!")
echo $stringName . PHP_EOL;

$user = ["name" => "Lusy", "age" => 29, "location" => "Donetsk"];
extract($user); // extract - перетворює ключ в змінну, а значення в значення в значення змінной.
echo ("$name $age $location") . PHP_EOL;

$name = "Busya";
$age = 78;
$location = "Lviv";

$array = compact("name", "age", "location"); // compact - перетворює ззмінну в ключ,
//                                                                   а значення змінной в значення ключа.
var_dump($array);
echo "==========================================================" . PHP_EOL;

$numbers = [-1, -6, 9, 9, -1, 10, false];
$positive = array_filter($numbers, function ($number) {  // array_filter - фільтрує усі значення які повертають false.
    //                                                      Також можно передати колбек функцію.
    return $number > 0;
});
var_dump($positive);
$unique = array_unique($numbers); // array_unique повертає лише унікальні значення.
var_dump($unique);
echo "==========================================================" . PHP_EOL;

$array1 = [1,2,3];
$array2 = [4,5,6];
$arrayMerge = array_merge($array1, $array2); // array_merge - обʼеднує масиви і не затірає по індексу!
var_dump($arrayMerge);

function myMap(array $array, callable $function) : array
{
    foreach ($array as $key => $value){
        $array[$key] = $function($value);
    }
    return $array;
}
$array = [1,2,3];
var_dump(myMap($array, fn ($number) => $number ** 2));

var_dump( array_map(fn ($number) => $number ** 2, $array2)); // array_map - приймає колбєк, та масив к якаому треба приминити колбек.

echo "==========================================================" . PHP_EOL;

$array = [1 => 22, 0 => 12, 2 => 33];
asort($array);  // asort - сортує значеня зі збереженням ключів. (багато функцій - дивись документацію.)
var_dump($array);

echo "==========================================================" . PHP_EOL;

const TEST = "TEST"; // const - назначаємо константу TEST (в классах). Доступно лише там де вона обьявлена.
define("TEST2", "TEST"); // Назначає константу (просто в коде) Доступно для всіх пространствах імен

echo "===========================Iterator-Genirator=============================" . PHP_EOL;

// Основне користь генератора в тому що на обьект не виділяєтся памʼять.
// Зазвичай приміняють при читанні великіх оʼбемів данних, читає по строчно.

function randomArraySecond() // ?array $randomArray = null ---> ?array запис шо може повернути нулл.
{
    for ($i = 1; $i <= 10; $i++) {
        $key = yield $i;
        if ($key == "stop"){ // якшо сюди потрапить ключ "stop" то робимо вихід.
            echo "key == \"stop\"" . PHP_EOL;
        }
    }
    yield "(+_+)"; // можно повертати декілька разів
    yield "(+_+)";
    yield "(+_+)";
    yield from ["Hello", "mister", "Jack"]; // можно в ітерацій засунути ще ітерацію, ключове слово from.
}

$genirator = randomArraySecond();
foreach ($genirator as $value) {
    if ($value === 9) {  // якшо значення === 9 то
        $genirator->send("stop"); // то передаємо в генератор $genirator значення "stop"
    }
    echo $value . PHP_EOL;
}

$genirator2 = randomArraySecond();
echo $genirator2->current() .PHP_EOL; // викликає значення ітератора.
$genirator2->next(); // викликає наступне значення ітерацій.
echo $genirator2->current() . PHP_EOL; // викликає значення ітератора.

echo "==========================================================" . PHP_EOL;

function generator(int $start, int $stop)
{
    for ($i = 1; $i <= 10; $i++) {
        $key = yield $i;
    }
}

$start = memory_get_usage(); // memory_get_usage - скільки використовує памʼяті в байтах.
$number = generator(1, 60000);
$end = memory_get_usage();
echo $end - $start . PHP_EOL;

echo "==========================file==========================" . PHP_EOL;

$file = fopen("test.txt", "w+"); // fopen - файл відкрити, тип данних - resource.
//              w+ - відкриває тільки для запису, якшо нема файла - намагаєтся створити.
fwrite($file, "Hello mathe faka" . PHP_EOL); // fwrite - записує в файл.
fclose($file); // fclose - закрили файл.
var_dump($file);

function fileWrite(string $path, string $content)
{
    $file = fopen($path, "a+");
    if (!$file){        // якшо файла нема - повертає фолс
        return false;
    }
    $result = fwrite($file, $content);
    fclose($file);

    if (!$result){
        return false;
    }
    return true;
}

fileWrite("test.txt", "Mr Robot say hello" . PHP_EOL);
file_exists("test.txt"); // file_exists - перевіряє чи існує файл.
$filePath = "test.txt";
if (file_exists($filePath)) {
    $file = fopen($filePath, "r");  // fopen - відкриває файл, приймає шлях до файлу.
    $size = filesize($filePath); // filesize - видає розмір файла у байтах.
    $content = fread($file, $size); //  fread - читає файл, але треба вказувати кінецевий розмір (filesize($file)).
    fclose($file);
    $content2 = file($filePath); // file - відкриває файл (указуємо шлях до файлу) та виводить масив з рядками.
}
fileWrite("test.txt", "Tester --> Mr Jack (+_+)". PHP_EOL);
echo "==========================================================" . PHP_EOL;

$file = fopen($filePath, "r");
$line = fgets($file);
$line2 = fgets($file);
echo $line . PHP_EOL;
echo $line2 . PHP_EOL;
while ($line = fgets($file)){
    echo $line . PHP_EOL;
}

//for ($i=0; $i <= 10000; $i++){
//    fileWrite("content.txt", "Mr Robot say hello : " . $i . PHP_EOL);
//}

$start = memory_get_usage();
$file = fopen("content.txt", "r");
$lines = [];
while ($line = fgets($file) !== false) {
    $lines[] = $line;
}
$end = memory_get_usage();
echo $end - $start . PHP_EOL;

echo "=========================(+_+)=============================" . PHP_EOL;

$filePath = "content.txt";
function generatorFile(string $filePath)
{
    $file = fopen($filePath, "r");
    while (($line = fgets($file)) !== false) {
        yield $line;
    }
    fclose($file);
}

$start2 = memory_get_usage();
generatorFile($filePath);

foreach (generatorFile($filePath) as $line) {
//     echo $line;
    // Iterate over the generator and consume its values
}

$end2 = memory_get_usage();
echo $end2 - $start2 . PHP_EOL;

echo "==========================Files===========================" . PHP_EOL;

$content = file_get_contents("test.txt"); // file_get_contents - зчитує данні з ресурсу (файлу, терміналу)
var_dump($content);
file_put_contents("test.txt", "File put contents" . PHP_EOL, FILE_APPEND); // file_put_contents - записуємо в файл.
// Файл ("text.txt"), контент ("File put contents"), FILE_APPEND - додаємо в кінець файла а не перезаписуємо.

unlink("test.txt"); // unlink - видаляє файл.
//rename("som_command.php", "som_cammand2.php"); // rename - перейменування файла, та можно переносити файл в іншу діректорію.


echo "==========================Connect File==========================" . PHP_EOL;

/*
include // підключає файл, якшо файлу нема викидує ворнінг та код відпрацьовує.
require // підключає файл, якшо файло не існує - фатал єрор
include_once // підключає файл, та перевіряє чи підключен був вже файл ворнинг, якшо так - не підключає.
require_once // підключає файл, якшо файлу нема - фатал ерор, якшо вже був підключен не пвдключає цого. */

include "functions.php";

logger("My second logs");

var_dump(get_included_files()); // get_included_files - виводить масиз з файлами які підключені.
echo "==========================================================" . PHP_EOL;

echo __DIR__ . PHP_EOL; // магічний метод - показує абсолютний шлях.
echo __FILE__ . PHP_EOL; // магічний метод - показує файл.
echo __LINE__ . PHP_EOL; // магічний метод - показує кількість строк.

//define("APP_DIR", __DIR__ . "/");
//
//echo APP_DIR . PHP_EOL;
echo "====================== Динамичній обʼект =============================<br>" . PHP_EOL;

$object = new stdClass; // створили класс
$object->name = "Jim"; // динамично задаємо властивості обʼєкту.
$object->age = 36;
$object->test = "TEST";
var_dump($object);
unset($object->test); // unset - видалити властівість.
foreach ($object as $key => $value){
    echo "$key => $value \n";
}
unset($person);
echo "==========================================================<br>" . PHP_EOL;

require_once "controllers/Person.php";

/*$person = new Person;
$person->name = "Jim";
$person->age = 36;

$person2 = new Person;
$person2->age = 32;

var_dump($person);
var_dump($person2);*/
$person = new Person("Jack",36);
$person2 = new Person("Suzi",  32);

$person = $person2; // це теж саме шо і &$person2 - посилання на ячейку пмʼяті
$person = clone $person2 ; // clone - клонування обєкту, копіювання

$person->printName() . "<br>"; // printName - метод до якого ми звертаємось в розрізі обʼєкту. Метож створили самі.
$person->printAge() . "<br>";

try {
    $person3 = new Person("B", 0);
} catch (Exception $exception){
    logger($exception -> getMessage() ." File: " . $exception->getFile() . " Line: " . $exception->getLine()); //
    // $exception -> getMessage() - повідомлення яку ми прописали в throw new Exception("Name in invalid");
    // " File: " . $exception->getFile() - файл в якому це трапилось.
    // " Line: " . $exception->getLine() - лінія на якой трапилось цей екзепшн.

}
unset($person);
unset($person2);

echo "<br>=========================Dinamic===========================<br>" . PHP_EOL;

require_once APP_DIR . "controllers/Dynamic.php";

$dynamic = new Dynamic();
$dynamic->name = "Mik"; // викликає НЕІСНУЮЧУ властивість (name).
echo $dynamic->age;

var_dump($dynamic); // name + age - встановили диномічно !!!

isset($dynamic->location);
empty($dynamic->sity);
unset($dynamic->dich); // видаляємо неіснуючу властивість, очікуєм виклика __unset

$dynamic->test("test", "test2"); // викликаємо неіснуючуго методу, очікуєм виклику __call.
echo "<br>=========================Наслідуваня та Інтерфейси===========================<br>" . PHP_EOL;


require_once "classes/Post.php";
require_once "classes/Blog.php";
require_once "interfaces/DiscountInterface.php";
require_once "classes/PercentageDiscount.php";
require_once "classes/Order.php";
require_once "classes/FixedDiscount.php";


$blog = new Blog("Som title", " Som content");

showPost($blog);
echo "<br>" . PHP_EOL;
var_dump($blog instanceof Post);  // instanceof Перевірка чи відносится обʼект $blog до классу  Post.
// True тому шо Blog наслідуєтся від Post


$items = [
    ['name' => 'PC', 'price' => 25000, 'amount' => 2],
    ['name' => 'PC mouse', 'price' => 4000, 'amount' => 1],
    ['name' => 'Monitor', 'price' => 7000, 'amount' => 2],
];

//try {
//    $discount = new PercentageDiscount(50);
//    $discountFixed = new FixedDiscount(2000, 10000);
//    $discountFixed->test('my test text');
//    $order = new Order($items, $discountFixed);
//
//   $order->calculateTotal();
//    $person = new Person('Jim', 30);
//
//    echo $person::$oldAge;
//    Person::showInfo();
////    echo $person->calculateOldAge();
//} catch (Exception $exception) {
//    echo $exception->getMessage();
//
//    Logger::log($exception->getMessage());
//    exit;
//}


try {
    $discount = new PercentageDiscount(50, 50000);
    $fixedDiscount = new FixedDiscount(1000, 100000);
    $order = new Order($items, $fixedDiscount);
    $order2 = new Order($items, $discount);

    echo $order->calculateTotal();
    echo "<br>" . PHP_EOL;
    echo $order2->calculateTotal();
    echo "<br>" . PHP_EOL;


}catch (Exception $exception){
    echo $exception->getMessage();
}
