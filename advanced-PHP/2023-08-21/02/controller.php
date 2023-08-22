<?php

    include 'model.php';
    include 'view.php';

    function prenesiVrijeme()
    {
        $vrijeme = dohvatiTrenutnoVrijeme();
        prikaziVrijeme($vrijeme);
    }
