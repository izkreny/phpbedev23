<?php

$ocjene = [1,2,3,4,5];
$sumaOcjena = 0;
$brojOcjena = 0;

// Izračunajmo prosjek ocjena proceduralnim načinom
foreach ($ocjene as $ocjena) { 
    $sumaOcjena += $ocjena;
    $brojOcjena += 1;
}

echo "Prosjek ocjena je (proceduralno): " . $sumaOcjena / $brojOcjena . "\n";


// OOP način aka definicija klas
class Ocjene {
    public $ocjene;

    public function prosjek() {
        $brojOcjena = count($this->ocjene);
        $sumaOcjena = array_sum($this->ocjene);
        $prosjekOcjena = $sumaOcjena / $brojOcjena;

        return $prosjekOcjena;
    }
}

$ocjene = new Ocjene();
$ocjene->ocjene = [1,2,3,4,5];
$prosjek = $ocjene->prosjek();

echo "Prosjek ocjena (OOP) je: " . $prosjek . "\n";
