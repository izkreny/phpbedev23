<?php

    include_once 'database.php';

    class Biljeska
    {
        private $conn;
        private $table = 'biljeska';

        public $id;
        public $naslov;
        public $sadrzaj;

        public function __construct($db)
        {
            $this->conn = $db;
        }

        public function dohvatiSveBiljeske()
        {
            $querry = "SELECT * FROM ". $this->table;
            $stmt = $this->conn->prepare($querry);
            $stmt->execute();
            
            return $stmt;
        }


        public function dodajBiljesku()
        {
            $this->naslov = htmlspecialchars(strip_tags($this->naslov));
            $this->sadrzaj = htmlspecialchars(strip_tags($this->sadrzaj));
            
            $querry = "INSERT INTO " . $this->table . " (naslov, sadrzaj) VALUES (:naslov, :sadrzaj)";
            $stmt = $this->conn->prepare($querry);

            $stmt->bindParam(':naslov', $this->naslov);
            $stmt->bindParam(':sadrzaj', $this->sadrzaj);
            
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }
