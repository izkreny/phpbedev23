<?php

class Person
{
    // Creating method
    public function hello()
    {
        echo "Hello, World!" . PHP_EOL;
    }
}

// Instantiation of the class via the object
$person = new Person();

// Calling up method
$person->hello();
