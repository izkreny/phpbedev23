<?php

    // TODO: Implement as Singleton desing patter
    class Database
    {
        private $dsn;
        private $conn;

        public function __construct($database)
        {
            // Fetch PDO_MYSQL Data Source Name (DSN) without dbname element:
            // $dsn = 'mysql:host=XXX;user=XXX;password=XXX;charset=utf8mb4'
            // https://www.php.net/manual/en/migration74.new-features.php#migration74.new-features.pdo
            require '/var/www/mysql-pdo-dsn.php';

            // Add database name to the PDO_MYSQL DSN
            $this->dsn = "{$dsn};dbname={$database}";
        }

        public function connect()
        {
            $this->conn = NULL;

            try {
                $this->conn = new PDO($this->dsn);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Error establishing a database connection!";
                echo $e->getMessage(); // Only in Development environment
            }

            return $this->conn;
        }
    }
