<?php

    include_once 'Controller.php';
    include_once 'Database.php';
    include_once 'Model.php';
    include_once 'View.php';

    $database = new Database('biljeske');
    $db = $database->connect();

    $model = new Biljeska($db);
    $view = new BiljeskaView();
    $controller = new BiljeskaController($model, $view);

    $view->prikaziFormu();

    if (isset($_POST['naslov']) and (isset($_POST['sadrzaj']))) {
        $naslov = $_POST['naslov'];
        $sadrzaj = $_POST['sadrzaj'];

        $controller->dodajBiljesku($naslov, $sadrzaj);
    }

    $controller->prikaziSveBiljeske();
