<?php

echo "Homework #1: Type a sentence (hit ENTER for end), and write every word in a separate line: ";
// HINT: Today is a     Thursday!

$sentence = trim(fgets(STDIN));

echo "### My way (NOT WORKING!): " . PHP_EOL;
$word = "";
$strlen = strlen($sentence) - 1;
for ($i = 0; $i <= $strlen; $i++) {
    if ($sentence[$i] != " " and $i !== $strlen) {
        $word .= $sentence[$i];
    }
    if ($word != "" and ($sentence[$i] == " " and $i !== $strlen)) {
        echo $word . PHP_EOL;
        $word = "";
    }
}

echo "### Ivan's way: " . PHP_EOL;
for ($i = 0; $i < (strlen($sentence) - 1); $i++) {
    if (($sentence[$i] == " ") and ($sentence[$i+1] != " ")) {
        $sentence[$i] = PHP_EOL;
    }
}
echo $sentence . PHP_EOL;


/***
 * After research: Possible improvement by searching all kind of 
 * whitespace characters via function ctype_space()
 * https://www.php.net/manual/en/function.ctype-space.php
 * 
 * Or speed up whole thing with this two functions:
 * https://www.php.net/manual/en/function.explode
 * https://www.php.net/manual/en/function.preg-split
 * 
 ***/
