<?php

    include 'model.php';
    include 'view.php';

    function obradiFormu()
    {
        if (isset($_POST['naslov']) and (isset($_POST['sadrzaj']))) {
            $naslov = $_POST['naslov'];
            $sadrzaj = $_POST['sadrzaj'];

            dodajBiljesku($naslov, $sadrzaj);
        }
    }
