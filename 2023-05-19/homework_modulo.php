<?php

echo "### Homework #1 - Print out all numbers between 1 and 100 which can be divided by 3" . PHP_EOL;

for ($i = 1; $i <= 100; $i++) {
    if ($i % 3 === 0) {
        echo "$i ";
    }
}
echo PHP_EOL;
