<?php

/***
class Automobil {
    public $marka;
    public function vozi() {
        echo "Automobil marke $this->marka vozi.\n";
    }
}

$auto = new Automobil();
$auto->marka = "BMW";
$auto->vozi();
***/


class Automobil {
    public $marka;
    public function __construct($novaMarka) {
        $this->marka = $novaMarka;
        echo "Novi automobil marke $this->marka je stvoren.\n";
    }
    public function vozi() {
        echo "Automobil marke $this->marka vozi.\n";
    }
    public function __destruct() {
        echo "Automobil marke $this->marka je uništen.\n";
    }
}

$auto = new Automobil("BMW");
$auto->vozi();
unset($auto);
