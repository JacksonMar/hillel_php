<?php


define("APP_DIR", __DIR__ . "/");

echo APP_DIR . PHP_EOL;
require_once APP_DIR . "classes/ImageType.php";
require_once APP_DIR . "classes/Image.php";


var_dump(ImageType::JPG);  // :: - це статичне отримання з КЛАССУ значеня, в контексту классу.
var_dump(ImageType::PNG->name); // ::PNG->name назва кейсу - PNG
var_dump(ImageType::PNG->value); // ::PNG->name назва кейсу в строковому вигляді - "jng"
var_dump(ImageType::PNG->cases()); // PNG->cases() набір всіх кейсів.
ImageType::PNG->testMethod(); // ::PNG->testMethod() - можно використовувати створені методи.


var_dump(pathinfo("test/path/images.jpeg")); // pathinfo - функція для отриманні інформацій про шлях.
// можно достати шлях, назву файла, розширення файла.
// array(4) { ["dirname"]=> string(8) "tes/path" ["basename"]=> string(11) "images.jpeg" ["extension"]=> string(4) "jpeg" ["filename"]=> string(6) "images" }
echo "<br>";
var_dump(pathinfo("test/path/images.jpeg", PATHINFO_EXTENSION));
echo "<br>";

$image = new Image("images.jpeg");
var_dump($image);
echo "<br>";
echo "<br>";
$image->resize(1000, 1000);
var_dump($image);
$image->convert(ImageType::WEBP);
echo "<br>";
var_dump($image);
echo "<br>";
$image->save();

var_dump(getimagesize("images.jpeg")); // getimagesize - вбудована функція, повертає ширіну та вистоту кортинки в пікселях.

//$image->save("myNewFile");
