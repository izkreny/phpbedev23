<?php

echo "### Print numbers from 1 to 10 using while and for loop" . PHP_EOL;

echo "### WHILE" . PHP_EOL;
$i = 1;
while ($i <= 10) {
    echo $i . PHP_EOL;
    $i++;
}

echo "### FOR" . PHP_EOL;
for ($x = 1; $x <= 10; $x++) {
    echo $x . PHP_EOL;
}

echo "### Print square values of numbers from 1 to 5" . PHP_EOL;

// https://www.php.net/manual/en/function.pow
// Alternative: https://www.php.net/manual/en/function.sqrt.php
for ($e = 1; $e <= 5; $e++) {
    echo "$e^2 => " . pow($e, 2) . PHP_EOL;
}

echo "### Calculate the sum of first five numbers using for loop" . PHP_EOL;

$sum = 0;
for ($r = 1; $r <= 5; $r++) {
    $sum += $r;
}
echo "Sum: " . $sum . PHP_EOL;

echo "### Calculate the sum of first five numbers using foreach loop" . PHP_EOL;

$firstFiveNumbers = [1, 2, 3, 4, 5];
$sum = 0;
foreach ($firstFiveNumbers as $number) {
    $sum += $number;
}
echo "Sum: " . $sum . PHP_EOL;

echo "### Calculate the sum using foreach loop of following numbers in an array: [2, 4, 6, 8, 10]" . PHP_EOL;

$array = [2, 4, 6, 8, 10];
$sum = 0;
foreach ($array as $number) {
    $sum += $number;
}
echo "Sum: " . $sum . PHP_EOL;

echo "### Calculate the sum using for loop of following numbers in an array: [2, 4, 6, 8, 10]" . PHP_EOL;

// https://www.php.net/manual/en/function.count.php
$sum = 0;
for ($s = 0; $s < count($array); $s++) {
    $sum += $array[$s];
}
echo "Sum: " . $sum . PHP_EOL;

echo "### Sum only odd numbers from 1 do 100 using while loop" . PHP_EOL;

$sum = 0;
$n = 1;
while ($n <= 100) {
    // Alternative is using if ($n % 2 == 1) and then $n++
    $sum += $n;
    $n += 2;
}
echo "Sum: " . $sum . PHP_EOL;

echo "### Use for loop to print out alphabet" . PHP_EOL;

// https://www.php.net/manual/en/function.chr
// Alternative: https://www.php.net/manual/en/function.range
for ($c = 97; $c <= 122; $c++) {
    echo chr($c) . " "; // range('a', 'z');
}

echo PHP_EOL;
