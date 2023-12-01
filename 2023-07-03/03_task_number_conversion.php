<?php

// https://www.php.net/manual/en/language.types.integer.php
$binaryNumber = '0b100';
$decimalNumber = bindec($binaryNumber);

echo "Decimal number (procedural): " . $decimalNumber . PHP_EOL;

class Number
{
    public $binaryNumber;

    public function convertBinaryToDecimal()
    {
        $decimalNumber = bindec($this->binaryNumber);

        return $decimalNumber;
    }
}

$number = new Number();
$number->binaryNumber = $binaryNumber;
$decimalNumber = $number->convertBinaryToDecimal();

echo "Decimal number (OOP): " . $decimalNumber . PHP_EOL;
