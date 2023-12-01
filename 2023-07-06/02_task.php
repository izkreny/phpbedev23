<?php

namespace Task\Shape;

abstract class Shape
{
    abstract public function calculateSurface();
}

class Circle extends Shape 
{
    private $radius;

    public function __construct($radius) 
    {
        $this->radius = $radius;
    }

    public function calculateSurface()
    {
        return pi() * pow($this->radius, 2);
    }
}

class Rectangle extends Shape 
{
    private $a;
    private $b;

    public function __construct($a, $b) 
    {
        $this->a = $a;
        $this->b = $b;
    }

    public function calculateSurface()
    {
        return $this->a * $this->b;
    }
}

$circle = new Circle(3);
echo "Circle surface: " . $circle->calculateSurface() . PHP_EOL;

$rectangle = new Rectangle(5, 10);
echo "Rectangle surface: " . $rectangle->calculateSurface() . PHP_EOL;
