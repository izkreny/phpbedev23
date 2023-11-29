<?php

$primeNr = [2, 3, 5, 7, 11];

var_dump(isset($primeNr[2]));
echo $primeNr[2] . PHP_EOL;

$primeNr[] = 13;
echo count($primeNr) . PHP_EOL;

print_r($primeNr);

rsort($primeNr);
print_r($primeNr);
