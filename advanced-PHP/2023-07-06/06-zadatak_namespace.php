<?php

namespace WebShop;

class Proizvod
{
    private $naziv;
    private $cijena;

    public function __construct($naziv, $cijena)
    {
        $this->naziv = $naziv;
        $this->cijena = $cijena;
    }

    public function getCijena()
    {
        return $this->cijena;
    }
}

class Kosarica
{
    private $kosarica = array();

    public function dodajProizvod(Proizvod $proizvod)
    {
        $this->kosarica[] = $proizvod;
    }

    public function izracunajUkupanIznos()
    {
        $suma = 0;
        foreach ($this->kosarica as $proizvod)
            $suma += $proizvod->getCijena();

        return $suma;
    }
}

use \WebShop\Proizvod as PR;
use \WebShop\Kosarica as KS;

$pr1 = new PR("Jabuka", 10);
$pr2 = new PR("Kruška", 20);

$kosarica = new KS();
$kosarica->dodajProizvod($pr1);
$kosarica->dodajProizvod($pr2);

echo "Ukupan iznos: " . $kosarica->izracunajUkupanIznos() . "\n";

?>
