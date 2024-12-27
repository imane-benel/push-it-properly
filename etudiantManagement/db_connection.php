<?php


// db_connection.php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "formulaire_db";

try {
    // Connexion à la base de données avec PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Définir le mode d'erreur PDO pour les exceptions
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("La connexion a échoué: " . $e->getMessage());
}
?>
