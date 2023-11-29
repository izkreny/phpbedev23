<?php

// https://www.php.net/manual/en/language.operators.increment.php

$a = 10;
$b = $a--; // Post-decrement
echo "A = " . $a . " B = " . $b . PHP_EOL;

$a = 10;
$b = --$a; // Pre-decrement
echo "A = " . $a . " B = " . $b . PHP_EOL;
