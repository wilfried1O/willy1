<?php
// Paramètres de connexion à la base de données
$host = 'localhost'; // Adresse du serveur
$dbname = 'pret'; // Nom de la base de données
$username = 'wilfried'; // Nom d'utilisateur MySQL
$password = 'wilfried'; // Mot de passe MySQL

try {
    // Création de la connexion PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

    // Configuration pour les erreurs (mode Exception)
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // En cas d'erreur, afficher le message et arrêter l'exécution
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>
