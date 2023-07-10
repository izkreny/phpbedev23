<?php

interface Automobil
{
    public function ubrzaj();
    public function koci();
}

class SportskiAuto implements Automobil
{
    public function ubrzaj()
    {
        echo "Sportski auto ubrzava!\n";
    }

    public function koci()
    {
        echo "Sportski auto koči...\n";
    }
}

class ObicanAuto implements Automobil
{
    public function ubrzaj()
    {
        echo "Običan auto ubrzava!\n";
    }

    public function koci()
    {
        echo "Običan auto koči...\n";
    }
}

$sport = new SportskiAuto();
$obican = new ObicanAuto();

$sport->ubrzaj();
$obican->koci();

?>
