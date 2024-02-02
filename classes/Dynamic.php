<?php

/*Тобто якшо в класі Dynamic будуть викликатись неіснуючі властивости,
__set + __get + private array $data = []; - створить ці властивості динамічно !!!
                    Називаєтся ПЕРЕВАНТАЖЕННЯ ВЛАСТИВОСТЕЙ
*/
class Dynamic
{
    private array $data = [];
    public function __set(string $name, mixed $value){ // __set - завжди маж string $name, mixed $value

        echo $name . " " . $value;
        $this->data[$name] = $value; // динамічно записуєм властивості які були викликани в обʼєкті.
    } // __set - викликаєтся коли ми встановлюєте НЕІСНУЮЧИ або Недоступні властивості.


    public function __get(string $name){ // __get - завжди маж string $name

        echo "<br>" . $name . "<br>";
        return $this->data[$name] ?? null;
    } // __get - викликаєтся коли ми ВСТАНОВЛЮТЕ НЕІСНУЮЧИ або Недоступні властивості.


    public function __isset(string $name) : bool // викликаєтся коли робимо - isset() empty()
    {
        echo "<br>" . $name . "<br>";

        return true;
    }


    public function __unset($name) : void // викликаєтся коли робимо unset.
    {
        echo "<br>" . $name . "<br>";
    }

    public function __call(string $name, array $arguments) // викликаєтся коли викликаємо не існуючуго метода.
    {
        echo $name;
        print_r($arguments);
    }
}


