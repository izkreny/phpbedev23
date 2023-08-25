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

        public function emailPostoji($email)
        {
            // metoda mora vratiti ili istinu ili laž

            $querry = "SELECT email FROM ". $this->table;
            $stmt = $this->conn->prepare($querry);
            $email = $stmt->execute()->fetchAll(PDO::FETCH_ASSOC);

            return if_array($email, $emails, strict);
        }
    }
