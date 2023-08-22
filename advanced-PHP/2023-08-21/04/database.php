<?php

    include '/var/www/mysql-pdo-dsn.php';

    $pdo = new PDO($dsn . 'dbname=biljeske');
