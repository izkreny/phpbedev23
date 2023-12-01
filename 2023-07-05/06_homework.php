<?php

abstract class Shape
{
    protected $color;

    public function __construct($color)
    {
        $this->color = $color;
    }

    abstract public function calculateSurface();
    abstract public function showDetails();
}

class Circle extends Shape 
{
    private $radius;

    public function __construct($color, $radius) 
    {
        parent::__construct($color);
        $this->radius = $radius;
    }

    public function calculateSurface()
    {
        return pi() * pow($this->radius, 2);
    }

    public function showDetails()
    {
        echo "Color: " . $this->color . PHP_EOL;
        echo "Radius: " . $this->radius . PHP_EOL;
    }
}

$circle = new Circle("Red", 3);
$circle->showDetails();
echo "Surface: " . $circle->calculateSurface() . PHP_EOL;
