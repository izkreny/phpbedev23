<?php

$rawJSON = file_get_contents('./people.json');
echo $rawJSON;

// https://www.php.net/manual/en/function.json-decode.php
$decodedJSON = json_decode($rawJSON, true); // Returned as an array
var_dump($decodedJSON);
