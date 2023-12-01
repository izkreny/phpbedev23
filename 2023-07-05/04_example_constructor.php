<?php

// https://www.php.net/manual/en/language.oop5.decon.php
class Automobile
{
    public $brand;

    public function __construct($brand)
    {
        $this->brand = $brand;
        echo "New {$this->brand} automobile is created." . PHP_EOL;
    }

    public function drive()
    {
        echo "Automobile of brand {$this->brand} drive." . PHP_EOL;
    }

    public function __destruct()
    {
        echo "Automobile of brand {$this->brand} crashed." . PHP_EOL;
    }
}

$car = new Automobile("BMW");
$car->drive();
// Destruction of the object happens automatically when the script ends
// unset($car);
