<?php

    spl_autoload_register(function ($class) {
        require "Core/{$class}.php";
    });

    $mysqlConfig = new Config('/var/www/config/mysql.ini');
    $database = Database::getInstance();
    $conn = $database->connect($mysqlConfig->getPdoDnsForDatabase('korisnici_db'));

    var_dump($conn->query('SELECT * FROM korisnici')->fetchAll(PDO::FETCH_ASSOC));
