<?php

class Person2
{
    private string $name = "Kate";
    // public - властивість доступна з классу і з усого коду.
    // protected - властивість доступна з середини классу та у вісх нащадках.
    // private - властивість доступна тільки в цьому класі.

    private int $age;

    public function __construct(string $name, int $age)  // __construct - метод який викликаєтся при визову обʼєкта.
    {
        $this->setName($name);
        $this->setAge($age);


        $this->name = $name; // ВСТАНОВЛЮЄМ властивості!
        $this->age = $age;
    }

    public function printName(): void
    {
        echo $this->name . PHP_EOL; // $this - звертаємость до імені обʼєкту з яким ми працюєм.
        // $this - звернутись до .... Звертання в контексті ОБʼЄКТУ !!!

        echo $this->getName(); // echo $this->getName(); - це після встановлення сетерів гетерів.


    }

    public function printAge(): void
    {
        echo $this->age . PHP_EOL;
    }

// set - get : єдина точхка входу ля чогось.  setName - встановлюємо імʼя, getName - отримуємо імʼя.

    public function getAge(): int
    {
        return $this->age;
    }

    public function setAge(int $age): void
    {
        if (strlen($age) < 1){
            throw new Exception("Age is invalid"); // викликаєм ісключеніе, а обробляти через try - catch
        }
        $this->age = $age;
    }

    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void //
    {
        $this->name = $name;
        if (strlen($name) < 2){
            throw new Exception("Name in invalid");  //  throw new Exception(); - викенути новий екзепшин.
        }
    }

    public function __destruct()  // __destruct - викликаєтся при видаленні обʼекту з памʼяті.
    {
        // TODO: Implement __destruct() method.

        echo "<br> $this->name --> destruct <br>" . PHP_EOL;
    }
}