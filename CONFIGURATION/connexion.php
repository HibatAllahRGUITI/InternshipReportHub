<?php
$servername = "127.0.0.1"; // Nom du serveur
$username = "root"; // Nom d'utilisateur MySQL
$password = ""; // Mot de passe MySQL
$database = "gestion_stages"; // Nom de la base de données

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $database, 3306);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
} 



