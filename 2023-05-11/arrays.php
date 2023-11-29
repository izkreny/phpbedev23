<?php

// Array as a list
$names = ["John", "Bob", "Derek"];

// Array as a map
$book = [
    "name" => "Vlak u snijegu",
    "author" => "Mato Lovrak",
    "published" => 1930
];

// Add a new element at the end of the array
$names[] = "Luke";

echo $names[0] . PHP_EOL;
print_r($names);
var_dump($names);

// Adding new value to the element of the array by key
$book["published"] = 2023;
print_r($book);

// Removing element from the array by the key
unset($book["name"]);
print_r($book);

// Removing element from the array by the index
unset($names[1]);
print_r($names);

echo var_dump(isset($book["name"]));
