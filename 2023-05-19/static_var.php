<?php

$a = 100;

// https://www.php.net/manual/en/language.variables.scope.php#language.variables.scope.static
function staticVar() {
    static $a = 0;
    echo "Inside the function: " . $a . PHP_EOL;
    $a++;
}

staticVar();
echo "Outside the function: " . $a . PHP_EOL;
staticVar();
echo "Outside the function: " . $a . PHP_EOL;
staticVar();
echo "Outside the function: " . $a . PHP_EOL;
staticVar();
echo "Outside the function: " . $a . PHP_EOL;
