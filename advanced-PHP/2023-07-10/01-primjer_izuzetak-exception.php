<?php

$broj1 = 5;
$broj2 = 0;

if ($broj2 == 0) {
    echo "Ne možemo dijeliti s nulom.\n";
} else {
    $rezultat = $broj1 / $broj2;
    echo $rezultat . "\n";
}

try
{
    $rezultat = $broj1 / $broj2;
    echo $rezultat . "\n";
}

catch(DivisionByZeroError $e)
{
    echo $e->getMessage() . "\n";
}

// Dio koda koji će se uvijek izvršiti
finally
{
    echo "Dio programa koji će UVIJEK biti izvršen!\n";
}

$email = "testgmail.com";

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Email je ispravan!\n";
} else {
    echo "Email NIJE ispravan!\n";
}

try
{
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Email je SUPER!\n";
    } else {
        throw new Exception ("Email NIJE kulj...\n");
    }
}

catch (Exception $e)
{
    echo $e->getMessage();
}



?>
