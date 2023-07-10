<?php

$brojTel = "123456AloAlo";

try
{
    // https://www.php.net/manual/en/function.filter-var.php
    // Returns the filtered data, or false if the filter fails.
    $filterBroj = filter_var($brojTel, FILTER_SANITIZE_NUMBER_INT);

    if (($filterBroj !== false) AND (strlen(strval($filterBroj)) <= 6)) {
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
