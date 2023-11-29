<?php

$a = 5;
$b = 2;

// https://www.php.net/manual/en/function.intval.php
$c = intval($a / $b);
$cFloat = $a / $b;
$cModulo = $a % $b;

echo "Integer division: " . $c . PHP_EOL;
echo "Division: " . $cFloat . PHP_EOL;
echo "$a modulo $b = " . $cModulo . PHP_EOL;
echo "Round 3.5: " . round(3.5) . PHP_EOL;
echo "Round DOWN 3.7: " . floor(3.7) . PHP_EOL;
echo "Round UP 3.3: " . ceil(3.3) . PHP_EOL;
