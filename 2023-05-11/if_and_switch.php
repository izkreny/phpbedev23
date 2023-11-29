<?php

$a = 1;

if ($a > 0) {
    echo "Number is greater than zero!" . PHP_EOL;
} elseif ($a < 0) {
    echo "Number is smaller than zero!" . PHP_EOL;
} else {
    echo "Number is equal to zero!" . PHP_EOL;
}

$grade = 2;

switch($grade) {
   case 1:
        echo "Grade: 1" . PHP_EOL;
        break;
   case 2:
        echo "Grade: 2" . PHP_EOL;
        break;
   case 3:
        echo "Grade: 3" . PHP_EOL;
        break;
   case 4:
        echo "Grade: 4" . PHP_EOL;
        break;
   case 5:
        echo "Grade: 5" . PHP_EOL;
        break;
   default:
        echo "Grade: NONEXISTING!" . PHP_EOL;
}
