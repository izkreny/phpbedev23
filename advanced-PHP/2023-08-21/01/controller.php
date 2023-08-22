<?php

    include 'model.php';
    include 'view.php';

    function prenesiRecenicu()
    {
        $recenica = dohvatiRecenicu();
        prikaziRecenicu($recenica);
    }
