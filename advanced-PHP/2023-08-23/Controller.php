<?php

    include_once 'Model.php';
    include_once 'View.php';

    class BiljeskaController
    {
        private $model;
        private $view;

        public function __construct($model, $view)
        {
            $this->model = $model;
            $this->view = $view;
        }

        public function prikaziSveBiljeske()
        {
            $biljeske = $this->model->dohvatiSveBiljeske()->fetchAll(PDO::FETCH_ASSOC);
            $this->view->prikaziBiljeske($biljeske);
        }

        public function dodajBiljesku($naslov, $sadrzaj)
        {
            $this->model->naslov = $naslov;
            $this->model->sadrzaj = $sadrzaj;
            $this->model->dodajBiljesku();
        }
    }
