<?php

    include 'model.php';
    include 'view.php';

    function obradiFormu()
    {
        if (isset($_GET['a']) and (isset($_GET['b']))) {
            $a = $_GET['a'];
            $b = $_GET['b'];

            $zbroj = zbroji($a, $b);
            prikaziZbroj($zbroj);
        }
    }
