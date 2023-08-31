<?php

    spl_autoload_register(function ($class) {
        require "Core/{$class}.php";
    });

    $mysqlConfig = new Config('/var/www/config/mysql.ini');
    $database = Database::getInstance();
    $conn = $database->connect($mysqlConfig->getPdoDnsForDatabase('korisnici_db'));

    
    $querry = 'SELECT * FROM korisnici';
    $stmt = $conn->prepare($querry);
    var_dump($stmt->execute());
