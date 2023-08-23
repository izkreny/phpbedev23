<?php

    include_once 'controller.php';
    include_once 'database.php';
    include_once 'model.php';
    include_once 'view.php';

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
