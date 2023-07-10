<?php

namespace Banka;

class Racun
{
    public function prikaziStanje()
    {
        echo "Stanje računa.\n";
    }
}

class Transakcija
{
    public function izvrsiTransakciju()
    {
        echo "Izvršavam transakciju...\n";
    }
}

use \Banka\Racun as BR;
use \Banka\Transakcija as BT;

$racun = new BR();
$trans = new BT();

$racun->prikaziStanje();
$trans->izvrsiTransakciju();

?>
