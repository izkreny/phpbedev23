<?php

$brojTel = "+012-345-Alo-Alo";

try
{
    // https://www.php.net/manual/en/function.preg-replace.php
    $filterBroj = preg_replace('/\D/', '', $brojTel);

    if (strlen(strval($filterBroj)) >= 6) {
        echo "Broj je ispravan: " . $filterBroj . "\n";
    } else {
        throw new Exception ("Nešto nije u redu s brojem telefona!\n");
    }
}

catch(Exception $e)
{
    echo $e->getMessage();
} 

?>
