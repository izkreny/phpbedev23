<?php

$a = 100;
$b = 3;

var_dump($a + $b);
var_dump($a - $b);
var_dump($a / $b);
var_dump($a * $b);
var_dump($a % $b);
var_dump($a += $b);
var_dump($a > $b);
var_dump($a++);
var_dump(++$a);
var_dump($b--);
var_dump(--$b);

$c = "One";
$d = "Two";
$f = $c . " " . $d;
echo $f . PHP_EOL;
