<?php

$brojTel = "+012-345-6-Alo-Alo";

try
{
    // https://www.php.net/manual/en/function.preg-replace.php
    // https://www.php.net/manual/en/regexp.reference.escape.php
    $filtriraniBroj = preg_replace('/\D/', '', $brojTel);

    if (strlen($filtriraniBroj) <= 6) {
        echo "Broj je ispravan: " . $filtriraniBroj . "\n";
    } else {
        throw new Exception ("Nešto nije u redu s brojem telefona!\n");
    }
}

catch(Exception $e)
{
    echo $e->getMessage();
} 

?>
