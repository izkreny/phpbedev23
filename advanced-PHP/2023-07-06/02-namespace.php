<?php

namespace Geometrija;

class Krug
{
    public function ispis()
    {
        echo "U imenskom smo prostoru geometrije.\n";
    }
}

namespace Matematika;

class Krug
{
    public function ispis()
    {
        echo "U imenskom smo prostoru matematike.\n";
    }
}

// Alias
use \Matematika\Krug as MK;

$krug = new \Geometrija\Krug();
$krug->ispis();
$krug = new MK();
$krug->ispis();

?>
