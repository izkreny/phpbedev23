<?php

// https://www.php.net/manual/en/language.variables.scope.php#language.variables.scope.global
$globalVar = "GLOBAL";

function local() {
    // It could also work with $localVar = $GLOBALS['globalVar'];
    global $globalVar;
    $localVar = $globalVar;
    echo "Inside the function: " . $localVar . PHP_EOL;
}

local();
echo "Outside the function: " . $globalVar . PHP_EOL;
