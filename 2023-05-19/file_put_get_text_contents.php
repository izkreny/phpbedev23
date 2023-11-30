<?php

$data = "This is the sentence that we write to the file." . PHP_EOL;
// Relative path
$file = './file.txt';

// https://www.php.net/manual/en/function.file-put-contents
if (file_put_contents($file, $data, FILE_APPEND) !== false) {
    echo "Successful writing to the file: " . $file . PHP_EOL;
} else {
    echo "Unsuccessful writing to the file: " . $file . PHP_EOL;
}

// https://www.php.net/manual/en/function.file-get-contents.php
$data = file_get_contents($file);
if ($data) {
    echo "Successful reading from the " . $file . PHP_EOL;
    echo "Content of the above mentioned file is: " . PHP_EOL . $data;
} else {
    echo "Unsuccessful reading from the " . $file . PHP_EOL;
}
