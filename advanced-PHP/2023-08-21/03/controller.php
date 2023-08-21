<?php

    include 'model.php';
    include 'view.php';

    function prenesiZbroj($a, $b)
    {
        $zbroj = zbroji($a, $b);
        prikaziZbroj($zbroj);
    }

?>
