<?php

// Check if number is even or odd
$number = 10;

echo "Number $number is ";
if ($number === 0) {
    echo "ZERO! \n";
} elseif ($number % 2 === 0) {
    echo "EVEN! \n";
} else {
    echo "ODD! \n";
}
