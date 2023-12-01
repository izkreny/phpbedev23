<?php

namespace Task\Interface;

interface Automobile
{
    public function speedUp();
    public function break();
}

class SportCar implements Automobile
{
    public function speedUp()
    {
        echo "Sport car speeds up!" . PHP_EOL;
    }

    public function break()
    {
        echo "Sport car breaks..." . PHP_EOL;
    }
}

class RegularCar implements Automobile
{
    public function speedUp()
    {
        echo "Regular car speeds up!" . PHP_EOL;
    }

    public function break()
    {
        echo "Regular car breaks..." . PHP_EOL;
    }
}

$sport = new SportCar();
$regular = new RegularCar();
$sport->speedUp();
$regular->break();
