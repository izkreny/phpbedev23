<?php

// Class
class Automobile
{
    // Attributes
    public $brand;
    public $color;

    // Methods
    public function drive()
    {
        echo "Automobile of brand {$this->brand} drive." . PHP_EOL;
    }
    
    public function shine()
    {
        echo "Automobile of brand {$this->brand} shine." . PHP_EOL;
    }
}

// Object instantiation
$car = new Automobile();
$car->brand = "BMW";
$car->drive();
$car->shine();
