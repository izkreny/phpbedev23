<?php

$int = 100;
$float = 99.99;
$string = "String";
$boolean = true;

echo "Integer: $int" . PHP_EOL;
echo "Float: $float" . PHP_EOL;
echo "String: $string" . PHP_EOL;
echo "Boolean: $boolean" . PHP_EOL;

define("PI", 3.14159265359);
define("G", 9.81);

// Concatenation
echo "PI: " . PI . PHP_EOL;
echo "G: " . G . PHP_EOL;

$a = 20;
$b = &$a;
echo "Variable b: $b" . PHP_EOL;
$a = 50;
echo "Variable b: $b" . PHP_EOL;

$variableType = gettype($boolean);
echo '$boolean is a variable of the following type: ' . $variableType . PHP_EOL;
