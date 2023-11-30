<?php

echo "### FOR ###" . PHP_EOL;

for ($i = 1; $i <= 10; $i++) {
    echo $i . PHP_EOL;
}

echo "### FOREACH ###" . PHP_EOL;

$days = ["Monday", "Tuesday", "Wednesday"];

foreach ($days as $day) {
   echo $day . PHP_EOL;
}
