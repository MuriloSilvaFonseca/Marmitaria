<?php 
    $host = "localhost";
    $user = "root";
    $pass = "1234";
    $data = "marmitaria";

    try {
        $conn = new PDO ("mysql:host=$host; dbname=$data", $user, $pass);
        $conn -> setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Erro de conexão" . $e->getMessage());
    }
?>