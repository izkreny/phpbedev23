<?php

// https://www.php.net/manual/en/language.namespaces.php
namespace Geometry;
class Circle
{
    public function whichNamespace()
    {
        echo "We are inside the Geometry namespace." . PHP_EOL;
    }
}

namespace Math;
class Circle
{
    public function whichNamespace()
    {
        echo "We are inside the Math namespace." . PHP_EOL;
    }
}

// Alias
use \Math\Circle as MK;

$circle = new \Geometry\Circle();
$circle->whichNamespace();
$circle = new MK();
$circle->whichNamespace();
