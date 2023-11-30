<?php

// Enter numbers until zero is the number.
// Print sum of all numbers entered.

$sum = 0;

// https://www.php.net/manual/en/features.commandline.io-streams.php
do {
    echo "Type number and press ENTER (0 is for EXIT): ";
    $input = trim(fgets(STDIN)); // $input is string
    $sum += $input; // $sum is integer
} while ($input != 0);

echo "SUM: " . $sum . PHP_EOL;
