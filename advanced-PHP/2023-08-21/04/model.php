<?php

    include 'database.php';

    function dohvatiSveBiljeske()
    {
        global $pdo;

        return $pdo->query("SELECT * FROM biljeska")->fetchAll();
    }

    function dodajBiljesku($naslov, $sadrzaj)
    {
        global $pdo;

        $stmt = $pdo->prepare('INSERT biljeska (naslov, sadrzaj) VALUES (:naslov, :sadrzaj)');
        $stmt->bindParam(':naslov', $naslov);
        $stmt->bindParam(':sadrzaj', $sadrzaj);
        $stmt->execute();
    }
