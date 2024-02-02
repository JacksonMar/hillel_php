<?php

class Person
{
    private string $name;
    private int $age;
    public static int $oldAge = 65; // static - статичний, можно викликати без створення обʼекту.

    public function __construct(string $name, int $age)
    {
        $this->setName($name);
        $this->setAge($age);
    }

    /**
     * @param int $age
     */
    public function setAge(int $age): void
    {
        if ($age < 1) {
            throw new Exception('Invalid name');
        }
        $this->age = $age;
    }

    public function calculateOldAge(): int
    {
        return self::$oldAge - $this->getAge();
    }

    public static function showInfo(): void
    {
        echo self::$oldAge;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        if (strlen($name) < 2) {
            throw new Exception('Invalid name');
        }
        Logger::log('in setName method');
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}