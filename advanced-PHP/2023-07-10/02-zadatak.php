<?php

class Klasa
{
    public $atribut;
}

try
{
    $objekt = new Klasa();
    //echo $objekt->nepostojeci;
    $objekt->nepostojeci = 1001;
}

catch(Error $e)
{
    echo $e->getMesssage();
}

?>
