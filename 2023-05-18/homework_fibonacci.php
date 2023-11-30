<?php

function fibonacci($n) {
    $fibonacciArray = [0, 1]; // Needs to be defined

    for ($i = 2; $i <= $n; $i++) {
        $fibonacciArray[$i] = $fibonacciArray[$i-1] + $fibonacciArray[$i-2];
    }
    return $fibonacciArray;
}

echo "Homework #2: Print out Fibonacci sequence made up from the following number of elements: ";
$result = fibonacci(trim(fgets(STDIN)));

echo "Result: ";
foreach ($result as $number) {
    echo $number . " ";
}

echo PHP_EOL;
