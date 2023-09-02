<?php

    include_once '../Model/Korisnik.php';
    include_once '../View/Login.php';
    include_once '../Config.php';

    class LoginController
    {
        private $model;
        private $view;
        private $poruke = [];

        public function __construct()
        {
            $mysqlConfig = new Config('/var/www/config/mysql.ini');
            $database = Database::getInstance();
            $this->model = new KorisnikModel($database->connect($mysqlConfig->getPdoDsnForDatabase('korisnici_db')));
            $this->view = new Login();
        }

        public function prikaziPoruke()
        {
            if (!empty($this->poruke)) {
                $this->view->prikaziPoruke($this->poruke);
            }
        }

        public function prikaziLogin()
        {
            $this->view->prikaziFormu();
        }

        private function provjeriEmail($email)
        {
            if ($this->model->postojiLi($email, 'email')) {
                return true;
            } else {
                return false;
            }
        }

        public function obradiLogin($podaci)
        {
            if ($this->provjeriEmail($podaci['email'])) { // TODO: Provjeriti i je li korisnik AKTIVIRAN!!!
                if (password_verify($podaci['lozinka'], $this->model->dohvatiLozinku($podaci['email']))) {
                    $this->poruke[] = "Korisnik je uspješno prijavljen u sustav!";
                } else {
                    $this->poruke[] = "Korisnik NIJE uspješno prijavljen u sustav!";
                }
            } else {
                $this->poruke[] = "Korisnik NE postoji u sustavu!";
            }
        }
    }

    $controller = new LoginController();
    
    if (!empty($_POST)) {
        $controller->obradiLogin($_POST);
    }
    $controller->prikaziPoruke();
    $controller->prikaziLogin();
