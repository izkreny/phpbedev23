<?php

function sum($number) {

    static $localStaticVar = 0;
    $localStaticVar += $number;

    return $localStaticVar;
}

// Declare function as a variable
// https://www.php.net/manual/en/functions.variable-functions.php
$sum = "sum";

// https://www.php.net/manual/en/function.rand.php
echo sum(rand(1, 10)) . PHP_EOL;
echo $sum(rand(1, 10)) . PHP_EOL;
echo $sum(rand(1, 10)) . PHP_EOL;
echo $sum(rand(1, 10)) . PHP_EOL;
echo $sum(rand(1, 10)) . PHP_EOL;
