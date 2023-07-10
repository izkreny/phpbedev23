<?php

abstract class Oblik
{
    protected $boja;

    public function __construct($boja)
    {
        $this->boja = $boja;
    }

    abstract public function izracunajPovrsinu();
    abstract public function prikaziDetalje();
}

class Krug extends Oblik 
{
    private $radijus;

    public function __construct($boja, $radijus) 
    {
        parent::__construct($boja);
        $this->radijus = $radijus;
    }

    public function izracunajPovrsinu()
    {
        return pi() * pow($this->radijus, 2);
    }

    public function prikaziDetalje()
    {
        echo "Boja: " . $this->boja . "\n";
        echo "Radijus: " . $this->radijus . "\n";
    }
}

$krug = new Krug("Crvena", 3);
$krug->prikaziDetalje();
echo "Povrsina: " . $krug->izracunajPovrsinu() . "\n";

?>
