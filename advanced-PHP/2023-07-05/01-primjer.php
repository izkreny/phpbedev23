<?php

class Automobil {

    // Atributi
    public $marka;
    public $boja;

    // Metode
    public function vozi() {
        echo "Automobil marke $this->marka vozi.\n";
    }
    public function svijetli() {
        echo "Automobil marke $this->marka svijetli.\n";
    }
}

// Instanciranje objekta
$auto = new Automobil();

$auto->marka = "BMW";
$auto->vozi();
$auto->svijetli();

?>
