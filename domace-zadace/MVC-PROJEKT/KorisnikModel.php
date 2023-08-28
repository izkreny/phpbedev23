<?php

    include_once 'Database.php';

    class KorisnikModel
    {
        private $conn;
        private $table = 'korisnici';

        public function __construct($db)
        {
            $this->conn = $db;
        }

        public function postojiLi($string, $column)
        {
            $querry = "SELECT {$column} FROM {$this->table} WHERE {$column} = :string";
            $stmt = $this->conn->prepare($querry);
            $stmt->bindParam(':string', $string, PDO::PARAM_STR);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        }

        public function aktivirajKorisnika($token)
        {
            $querry = "UPDATE {$this->table} SET status = 1, token = '' WHERE token = ?";
            $stmt = $this->conn->prepare($querry);
            $stmt->bindParam(1, $token, PDO::PARAM_STR);
            $stmt->execute();
            
            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        }

        public function dodajKorisnika($podaci)
        {
            // https://www.php.net/manual/en/function.password-hash.php
            $podaci['lozinka'] = password_hash($podaci['lozinka'], PASSWORD_DEFAULT);

            // https://www.php.net/manual/en/function.random-bytes.php
            // https://www.php.net/manual/en/function.bin2hex
            $podaci['token'] = bin2hex(random_bytes(10));


            $podaci['ime'] = htmlspecialchars(strip_tags($podaci['ime']));
            $podaci['prezime'] = htmlspecialchars(strip_tags($podaci['prezime']));

            $querry = "
                INSERT INTO {$this->table}
                (ime, prezime, email, lozinka, token)
                VALUES
                (:ime, :prezime, :email, :lozinka, :token)
            ";

            if ($this->conn->prepare($querry)->execute($podaci)) {
                return true;
            } else {
                return false;
            }
        }

    }
