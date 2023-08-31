<?php

    class Database
    {
        private static $instance;
        private $conn;

        private function __construct()
        {
        }

        public static function getInstance()
        {
            if (!self::$instance) {
                self::$instance = new self();
            }

            return self::$instance;
        }

        public function connect($dsn)
        {
            $this->conn = NULL;

            try {
                $this->conn = new PDO($dsn);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Error establishing a database connection!";
                echo $e->getMessage(); // Only in Development environment
            }

            return $this->conn;
        }
    }
