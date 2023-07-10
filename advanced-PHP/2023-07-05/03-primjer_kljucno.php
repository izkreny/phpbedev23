<?php

// Apstrakcija (vs detaljizacija
abstract class Oblik {
    abstract public function izracunajPovrsinu();
}

class Kvadrat extends Oblik {
    private $duzinaStranice;
    public function __construct($duzinaStranice) {
        $this->duzinaStranice = $duzinaStranice;
    }
    public function izracunajPovrsinu() {
        return $this->duzinaStranice * $this->duzinaStranice;
    }
}

$k = new Kvadrat(5);
echo "Povrsina je: " . $k->izracunajPovrsinu() . "\n";

// Nasljeđivanje
class Vozilo {
    protected $brzina;
    public function ubrzaj($vrijednost) {
        $this->brzina += $vrijednost;
    }
}

class Automobil extends Vozilo {
    public function ispisiBrzinu() {
        echo "Brzina automobila je: " . $this->brzina . "\n";
    }
}

$auto = new Automobil();
$auto->ubrzaj(30);
$auto->ispisiBrzinu();

?>
