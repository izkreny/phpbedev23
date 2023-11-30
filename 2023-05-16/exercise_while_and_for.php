<?php

echo '### WHILE ###' . PHP_EOL;

$i = 1;
while ($i <= 10) {
    echo $i . ' ';
    $i++;
}
echo PHP_EOL;

echo '### FOR ###' . PHP_EOL;

for ($i = 1; $i <= 100; $i++) if ($i % 2 === 0) echo $i . ' ';
echo PHP_EOL;

for ($i = 2; $i <= 100; $i+=2) echo $i . ' ';
echo PHP_EOL;
