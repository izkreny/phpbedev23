<?php

echo "### Homework #4 - Check if the IBAN is from Croatia. :D" . PHP_EOL;

echo "Type IBAN and press ENTER: ";
$iban = trim(fgets(STDIN));

// https://wise.com/gb/iban/croatia
if ((strlen($iban) === 21) and (strtoupper(substr($iban, 0, 2)) === "HR")) {
    echo "IBAN is from Croatia!" . PHP_EOL;
} else {
    echo "IBAN is NOT from Croatia!" . PHP_EOL;
}
