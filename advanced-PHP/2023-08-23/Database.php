<?php

    class Database
    {

        private $dsn;
        private $conn;

        public function __construct()
        {
            include_once '/var/www/mysql-pdo-dsn.php';

            $this->dsn = $dsn . 'dbname=biljeske';
        }

        public function connect()
        {
            $this->conn = NULL;

            try {
                $this->conn = new PDO($this->dsn);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Greška prilikom spajanja na bazu!";
                // Samo za development sučelje
                echo $e->getMessage();
            }

            return $this->conn;
        }
    }
