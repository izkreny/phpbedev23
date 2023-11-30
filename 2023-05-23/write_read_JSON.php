<?php

$array = [];
$i = 0;
do {
    echo "First name: ";
    $array[$i]['name'] = trim(fgets(STDIN));

    echo "Last name: ";
    $array[$i]['surname'] = trim(fgets(STDIN));

    echo "How old are you? ";
    $array[$i]['age'] = trim(fgets(STDIN));

    echo "Continue input process? [y|n] ";
    $continue = trim(fgets(STDIN));

    $i++;
} while ($continue != "n");

$file = './people.json';

// https://www.php.net/manual/en/function.file-put-contents
if (file_put_contents($file, json_encode($array, JSON_PRETTY_PRINT), FILE_APPEND) != false) {
    echo "Successful writing to the file: " . $file . PHP_EOL;
} else {
    echo "Unsuccessful writing to the file: " . $file . PHP_EOL;
}

// https://www.php.net/manual/en/function.file-get-contents.php
$data = json_decode(file_get_contents($file), true);
if ($data) {
    echo "Successful reading from the " . $file . PHP_EOL;
    echo "Content of the above mentioned file is: " . PHP_EOL;
    var_dump($data);
} else {
    echo "Unsuccessful reading from the " . $file . PHP_EOL;
}
