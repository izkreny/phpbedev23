<?php

class BankovniRacun {

    // Atributi
    private $vlasnik;
    private $stanje;

    // Metode
    // Setter
    public function postaviVlasnika($vlasnik) {
        $this->vlasnik = $vlasnik;
    }
    // Getter
    public function dohvatiVlasnika() {
        return $this->vlasnik;
    }
    // Setter
    public function postaviStanje($stanje) {
        $this->stanje = $stanje;
    }
    // Getter
    public function dohvatiStanje() {
        return $this->stanje;
    }
}

// Instanciranje objekta
$racun = new BankovniRacun();

$racun->postaviVlasnika("Pero Peric");
$racun->postaviStanje(1000);

echo "Vlasnik racuna je: " . $racun->dohvatiVlasnika() . "\n";
echo "Stanje racuna je: " . $racun->dohvatiStanje() . "\n";

?>
