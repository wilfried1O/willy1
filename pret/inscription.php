<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $telephone = htmlspecialchars($_POST['phone']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare('INSERT INTO users (nom, email, telephone, password) VALUES (?, ?, ?, ?)');
    if ($stmt->execute([$nom, $email, $telephone, $password])) {
        header('Location: connexion.html?inscription=success');
        exit;
    } else {
        echo "Erreur lors de l'inscription. Veuillez réessayer.";
    }
}
?>
