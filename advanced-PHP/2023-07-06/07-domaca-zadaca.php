<?php

namespace Tvrtka;

class Zaposlenik
{
    private $ime;
    private $prezime;
    private $placa;

    public function __construct($ime, $prezime, $placa)
    {
        $this->ime = $ime;
        $this->prezime = $prezime;
        $this->placa = $placa;
    }

    public function prikaziDetalje()
    {
        echo $this->ime . " " . $this->prezime . " (Plaća: " . $this->placa . ")\n";
    }
}

class Odjel
{
    private $naziv;
    private $zaposlenici = array();

    public function __construct($naziv)
    {
        $this->naziv = $naziv;
    }

    public function dodajZaposlenika(Zaposlenik $zaposlenik)
    {
        $this->zaposlenici[] = $zaposlenik;
    }

    public function prikaziDetalje()
    {
        echo "U odjelu " . $this->naziv . " rade:\n";
        foreach ($this->zaposlenici as $zaposlenik)
            echo $zaposlenik->prikaziDetalje();
    }
}

use \Tvrtka\Zaposlenik as TZ;
use \Tvrtka\Odjel as TO;

$zp1 = new TZ("Pero", "Perić", 1001);
$zp2 = new TZ("Ante", "Antić", 2002);
$zp3 = new TZ("Maro", "Marić", 3003);

$odjel = new TO("Financije");
$odjel->dodajZaposlenika($zp1);
$odjel->dodajZaposlenika($zp2);
$odjel->dodajZaposlenika($zp3);

$odjel->prikaziDetalje();
