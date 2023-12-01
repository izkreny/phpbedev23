<?php

namespace Abstraction;

// Abstraction and Constructor
abstract class Shape
{
    abstract public function calculateSurface();
}

class Square extends Shape
{
    private $sideLength;

    public function __construct($sideLength)
    {
        $this->sideLength = $sideLength;
    }
    
    public function calculateSurface()
    {
        return pow($this->sideLength, 2);
    }
}

$k = new Square(5);
echo "Surface is: " . $k->calculateSurface() . PHP_EOL;

// Encapsulation and inheritance
class Vehicle
{
    protected $speed;

    public function speedUp($value)
    {
        $this->speed += $value;
    }
}

class Automobile extends Vehicle
{
    public function getSpeed()
    {
        echo "Automobile speed is: " . $this->speed . PHP_EOL;
    }
}

$car = new Automobile();
$car->speedUp(30);
$car->getSpeed();
