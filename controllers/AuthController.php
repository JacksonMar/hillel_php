<?php

require_once "controllers/Controller.php";
class AuthController extends Controller
{
    use Validator, Math

    {    // use - ключове слово для використання трейду
        Validator::max insteadof Math; // якшо в нас однакови методи в 2-х валідаторах, то можемо визначити який використовуємо. insteadof - ключове слово.
        Math::max as mathMax;
    }

    public function register()
    {
        $name = '1';
        $email = 'jim@gmail.com';

        $this->max('test',5) . PHP_EOL; //  $this->max - дергаем метод з трейду. Так само якби він був в нашому класі.
//        echo 'Success';
    }

//    public function max(string $string, int $max): bool // якшо є однакові методи в трейді і в коді, то буде викликатись функція з класу, потім с трейду, потім з бальківського классу.
//    {
//       echo 'max in class' . PHP_EOL;
//       return true;
//   }

}