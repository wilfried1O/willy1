<!-- admin_login.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Administrateur</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; text-align: center; }
        form { display: inline-block; max-width: 300px; margin-top: 50px; }
        input, button { width: 100%; margin: 10px 0; padding: 10px; border-radius: 5px; border: 1px solid #ddd; }
        button { background-color: #007BFF; color: white; cursor: pointer; }
    </style>
</head>
<body>
    <h1>Connexion Administrateur</h1>
    <form action="admin_dashboard.php" method="POST">
        <input type="text" name="username" placeholder="Nom d'utilisateur" required>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <button type="submit">Se connecter</button>
    </form>
</body>
</html>
