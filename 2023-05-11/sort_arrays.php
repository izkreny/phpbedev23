<?php

$names = [
    "name" => "Adam",
    "surname" => "Smith",
    "city" => "Los Angeles"
];

// Sort an array by key in ascending order
// https://www.php.net/manual/en/function.ksort.php
ksort($names);
var_dump($names);

// Sort an array in ascending order and maintain index association
// https://www.php.net/manual/en/function.asort
asort($names);
var_dump($names);

// Sort an array in ascending order
// https://www.php.net/manual/en/function.sort.php
sort($names);
var_dump($names);
