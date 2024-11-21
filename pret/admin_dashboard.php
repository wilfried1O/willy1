<!-- admin_dashboard.php -->
<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Valider les identifiants (simulation simple)
    if ($_POST['username'] === 'admin' && $_POST['password'] === 'admin123') {
        $_SESSION['admin'] = true;
    } else {
        echo "<p>Identifiants incorrects.</p>";
        exit;
    }
} elseif (!isset($_SESSION['admin'])) {
    header('Location: admin_login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord Administrateur</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h1 { color: #333; }
        .actions { display: flex; gap: 20px; flex-wrap: wrap; }
        .action { border: 1px solid #ddd; border-radius: 8px; padding: 15px; text-align: center; width: 200px; }
        .action a { text-decoration: none; color: #007BFF; font-weight: bold; }
        .action a:hover { color: #0056b3; }
    </style>
</head>
<body>
    <h1>Bienvenue, Administrateur</h1>
    <div class="actions">
        <div class="action"><a href="inscription_clients.php">Voir les Inscrits</a></div>
        <div class="action"><a href="demandes_offres.php">Demandes d'Offres</a></div>
        <div class="action"><a href="create_offre.php">Créer une Offre</a></div>
    </div>
    <a href="admin_login.php">Déconnexion</a>
</body>
</html>
