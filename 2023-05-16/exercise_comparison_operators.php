<?php

$c = 5;
$b = 10;
$a = 15;

if (($a < $b and $b < $c) or ($a > $b and $b > $c)) {
    echo "$b is between $a nad $c." . PHP_EOL; 
} else {
    echo "$b is NOT between $a and $c." . PHP_EOL;
}
