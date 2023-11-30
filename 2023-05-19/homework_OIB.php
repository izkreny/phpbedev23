<?php

echo "### Homework #2 - Determine if the OIB has the correct number of digits." . PHP_EOL;
echo "### Homework #3 - Determine if the OIB is composed only from numbers." . PHP_EOL;

echo "Enter the OIB and press ENTER: ";
$oib = trim(fgets(STDIN));
$oibLen = strlen($oib);

if ($oibLen === 11) {
    echo "OIB have correct number of digits (11)." . PHP_EOL;
} else {
    echo "OIB does NOT have correct number of digits (11)." . PHP_EOL;
}

// https://www.php.net/manual/en/function.is-numeric
// You can check whole $oib variable
// OR loop all characters and check with $ascii = ord($oib[$j])
// if they are between 48 and 57

$j = 0;
while ($j < $oibLen) {
    if (is_numeric($oib[$j])) {
        $j++;
    } else {
        $j = $oibLen * 2;
    }
}

if ($j == $oibLen) {
    echo "OIB is composed only from numbers!" . PHP_EOL;
} else {
    echo "OIB is NOT composed only from numbers!" . PHP_EOL;
}
