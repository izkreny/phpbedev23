<?php

echo "### WHILE ###" . PHP_EOL;
$i = 1;
while ($i <= 4) {
    echo $i . PHP_EOL;
    $i++;
}

echo "### DO WHILE ###" . PHP_EOL;
$i = 4;
do {
    echo $i . PHP_EOL;
    $i--;
} while ($i >= 1);
