<?php

    include_once 'Controller.php';
    include_once 'Database.php';
    include_once 'Model.php';
    include_once 'View.php';

    $database = new Database();
    $db = $database->connect();

    $view = new BiljeskaView();
    $model = new Biljeska($db);
    $controller = new BiljeskaController($model, $view);

    $view->prikaziFormu();

    if (isset($_POST['naslov']) and (isset($_POST['sadrzaj']))) {
        $naslov = $_POST['naslov'];
        $sadrzaj = $_POST['sadrzaj'];

        $controller->dodajBiljesku($naslov, $sadrzaj);
    }

    $controller->prikaziSveBiljeske();
