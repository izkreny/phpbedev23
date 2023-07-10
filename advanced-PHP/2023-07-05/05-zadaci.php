<?php

/*** PRVI ***/
class Osoba {
    private $ime;
    private $prezime;

    public function setIme($ime) {
        $this->ime = $ime;
    }
    public function getIme() {
        return $this->ime;
    }
    public function setPrezime($prezime) {
        $this->prezime = $prezime;
    }
    public function getPrezime() {
        return $this->prezime;
    }
}

$osoba = new Osoba();
$osoba->setIme("Slobodan");
$osoba->setPrezime("Prijevoz");
echo "Ime: " . $osoba->getIme() . "\n";
echo "Prezime: " . $osoba->getPrezime() . "\n";


/*** DRUGI ***/
class Oblik {
    protected $brojStranica;
    protected $boja;

    public function prikaziDetalje() {
        echo "Broj stranica: " . $this->brojStranica . "\n";
        echo "Boja: " . $this->boja . "\n";
    }
}

class Kvadrat extends Oblik {
    public function __construct() {
        $this->brojStranica = 4;
        $this->boja = "Crvena";
    }
}

$kvadrat = new Kvadrat();
$kvadrat->prikaziDetalje();


/*** TREĆI ***/
/*
abstract class Voce {
    protected $naziv;

    abstract public function ispisiNaziv();
}

class Jabuka extends Voce {
    public function __construct(
    public ispisiPoruku() {
        echo $this->naziv;
    }
}

$jabuka = new Jabuka("Delišes");
$jabuka->ispisiNaziv();
*/

/*** ČETVRTI ***/
class Knjiga {
    private $naslov;
    private $autor;

    public function __construct($naslov, $autor) {
        $this->naslov = $naslov;
        $this->autor = $autor;
    }
    public function __destruct() {
        echo "Knjiga $this->naslov autora $this->autor je SPALJENA! :-)\n";
    }

    public function detalji() {
        echo "Naslov: " . $this->naslov . "\n";
        echo "Autor: " . $this->autor . "\n";
    }
}

$knjiga = new Knjiga("Biblija", "Bog");
$knjiga->detalji();
//unset($knjiga);
