<?php

    include_once '../Model/Korisnik.php';
    include_once '../View/Registracija.php';

    class KorisnikController
    {
        private $model;
        private $view;
        private $poruke = [];

        public function __construct()
        {
            $database = new Database('korisnici_db');
            $this->model = new KorisnikModel($database->connect());
            $this->view = new Registracija();
        }

        public function prikaziPoruke()
        {
            if (!empty($this->poruke)) {
                $this->view->prikaziPoruke($this->poruke);
            }
        }

        public function prikaziRegistraciju()
        {
            $this->view->prikaziFormu();
        }

        private function provjeriEmailFormat($email)
        {
            // https://www.php.net/manual/en/filter.examples.validation.php
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return true;
            } else {
                $this->poruke[] = "Format email adrese nije valjan!";

                return false;
            }
        }

        private function provjeriLozinke($lozinka, $ponovljena_lozinka)
        {
            if ($lozinka === $ponovljena_lozinka) {
                return true;
            } else {
                $this->poruke[] = "Lozinke nisu identične!";

                return false;
            }
        }

        private function provjeriEmail($email)
        {
            if ($this->model->postojiLi($email, 'email')) {
                $this->poruke[] = "Email već postoji u sustavu!";

                return false;
            } else {
                return true;
            }
        }

        private function posaljiMail($podaci)
        {
            // TODO: Poslati korisniku mail s potvrdnim linkom koji sadrži token
            
            $this->poruke[] = "Korisniku NIJE poslan mail s potvrdnim linkom koji sadrži token!";
        }

        public function obradiRegistraciju($podaci)
        {
            if (
                $this->provjeriEmail($podaci['email'])
                and $this->provjeriEmailFormat($podaci['email'])
                and $this->provjeriLozinke($podaci['lozinka'], $podaci['ponovljena_lozinka']) 
            ) {
                // https://www.php.net/manual/en/function.password-hash.php
                $podaci['lozinka'] = password_hash($podaci['lozinka'], PASSWORD_DEFAULT);

                // https://www.php.net/manual/en/function.random-bytes.php
                // https://www.php.net/manual/en/function.bin2hex
                $podaci['token'] = bin2hex(random_bytes(8));

                // https://www.php.net/manual/en/function.htmlspecialchars
                // https://www.php.net/manual/en/function.strip-tags
                $podaci['ime'] = htmlspecialchars(strip_tags($podaci['ime']));
                $podaci['prezime'] = htmlspecialchars(strip_tags($podaci['prezime']));

                unset($podaci['ponovljena_lozinka']);
                
                if ($this->model->dodajKorisnika($podaci)) {
                    $this->poruke[] = "Korisnik je uspješno upisan u bazu!";
                    $this->posaljiMail($podaci);
                } else {
                    $this->poruke[] = "Korisnik NIJE uspješno upisan u bazu!";
                }
            }
        }
    }

    $controller = new KorisnikController();
    
    if (!empty($_POST)) {
        $controller->obradiRegistraciju($_POST);
    }
    $controller->prikaziPoruke();
    $controller->prikaziRegistraciju();
