<?php

echo '<pre>';

$users = [
    [
        "name" => "Jakov",
        "surname" => "Kušan",
        "age" => 35,
        "gender" => "M"
    ],
    [
        "name" => "Ana",
        "surname" => "Gotovac",
        "age" => 25,
        "gender" => "F"
    ]
];
print_r($users);

unset($users[0]["gender"]);
unset($users[1]["gender"]);
print_r($users);

$users[] = [
    "name" => "Kiki",
    "surname" => "Kurtis",
    "age" => 45
];
print_r($users);

echo '</pre>';
