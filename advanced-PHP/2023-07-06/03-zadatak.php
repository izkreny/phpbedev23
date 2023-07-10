<?php

abstract class Oblik
{
    abstract public function izracunajPovrsinu();
}

class Krug extends Oblik 
{
    private $radijus;

    public function __construct($radijus) 
    {
        $this->radijus = $radijus;
    }

    public function izracunajPovrsinu()
    {
        return pi() * pow($this->radijus, 2);
    }
}

class Pravokutnik extends Oblik 
{
    private $a;
    private $b;

    public function __construct($a, $b) 
    {
        $this->a = $a;
        $this->b = $b;
    }

    public function izracunajPovrsinu()
    {
        return $this->a * $this->b;
    }
}

$krug = new Krug(3);
echo "Povrsina: " . $krug->izracunajPovrsinu() . "\n";

$pravokutnik = new Pravokutnik(5, 10);
echo "Povrsina: " . $pravokutnik->izracunajPovrsinu() . "\n";

?>
