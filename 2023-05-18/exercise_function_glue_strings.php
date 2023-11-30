<?php

function glueStrings($name, $surname) {
    $gluedStrings = $name . " " . $surname;

    return $gluedStrings;
}

$var = glueStrings("Elon", "Musk");

echo $var . PHP_EOL;
