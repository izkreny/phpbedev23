<?php

// https://www.php.net/manual/en/language.references.php

$a = 5;
$b = $a; // Without reference
$a = 6;

echo "Without reference: $b" . PHP_EOL;

$a = 5;
$b = &$a; // With reference
$a = 6;

echo "With reference: $b" . PHP_EOL;
