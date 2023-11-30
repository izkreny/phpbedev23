<?php

echo "### Homework #5 - Place string 'PHP master' between first and last name." . PHP_EOL;

echo "Enter you first and last name and press ENTER: ";
$fullName = trim(fgets(STDIN));

$string = "PHP master";

// Remove all extra whitespace chars
// https://www.php.net/manual/en/function.preg-replace
$fullName = preg_replace('/\s+/', ' ', $fullName);
var_dump($fullName);

// Insert $string between first and last name
// Alternative: https://www.php.net/manual/en/function.explode
$fullName = str_replace(" ", ' ' . $string . ' ', $fullName);
var_dump($fullName);
