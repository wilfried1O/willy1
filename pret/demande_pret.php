<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demande de Prêt</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            line-height: 1.6;
            background-color: #f9f9f9;
        }
        header {
            background: #007BFF;
            color: #fff;
            padding: 10px 20px;
            text-align: center;
        }
        header .logo {
            font-size: 1.5em;
            font-weight: bold;
        }
        header .menu {
            list-style: none;
            padding: 0;
            margin: 10px 0 0;
            display: flex;
            justify-content: center;
            gap: 20px;
        }
        header .menu li {
            display: inline;
        }
        header .menu a {
            text-decoration: none;
            color: white;
            font-weight: bold;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        #offres {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            justify-content: center;
        }
        .offre {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            background: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }
        .offre h3 {
            color: #007BFF;
        }
        .offre p {
            margin: 10px 0;
        }
        .offre button {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
        }
        .offre button:hover {
            background-color: #0056b3;
        }
        #formulaireDemande {
            display: none;
            margin: 30px auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            max-width: 400px;
        }
        form label {
            font-weight: bold;
        }
        form input, form button {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        form button {
            background-color: #28a745;
            color: white;
            border: none;
        }
        form button:hover {
            background-color: #218838;
        }
        footer {
            text-align: center;
            margin-top: 30px;
            color: #555;
        }
    </style>
</head>
<body>

<header>
    <div class="logo">Prêts en Ligne</div>
    <ul class="menu">
        <li><a href="#">Accueil</a></li>
        <li><a href="#">Catalogue des Prêts</a></li>
        <li><a href="#">Demander un Prêt</a></li>
        <li><a href="#">Contact</a></li>
        <li><a href="#" class="btn-connexion">Connexion</a></li>
    </ul>
</header>

<h2>Nos Offres de Prêt</h2>
<div id="offres">
    <?php
    // Connexion à la base de données
    $conn = new PDO('mysql:host=localhost;dbname=pret', 'wilfried', 'wilfried');

    // Récupérer les offres de prêt
    $query = $conn->query("SELECT * FROM offres_pret");
    while ($offre = $query->fetch(PDO::FETCH_ASSOC)) {
        echo "
        <div class='offre'>
            <h3>{$offre['type_pret']}</h3>
            <p>Montant maximum : {$offre['montant_max']}€</p>
            <p>Taux d'intérêt : {$offre['taux_interet']}%</p>
            <p>Durée maximale : {$offre['duree_max']} mois</p>
            <button onclick=\"afficherFormulaire('{$offre['type_pret']}')\">Choisir cette offre</button>
        </div>
        ";
    }
    ?>
</div>

<div id="formulaireDemande">
    <h3>Formulaire de Demande de Prêt</h3>
    <form action="submit_demande.php" method="POST">
        <input type="hidden" id="typePret" name="type_pret">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required>
        
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required>
        
        <label for="montant">Montant demandé :</label>
        <input type="number" id="montant" name="montant" required>
        
        <label for="duree">Durée souhaitée (en mois) :</label>
        <input type="number" id="duree" name="duree" required>
        
        <button type="submit">Soumettre la demande</button>
    </form>
</div>

<script>
    function afficherFormulaire(typePret) {
        document.getElementById('typePret').value = typePret;
        document.getElementById('formulaireDemande').style.display = 'block';
        window.scrollTo(0, document.getElementById('formulaireDemande').offsetTop);
    }
</script>

<footer>
    <p>&copy; 2024 Prêts en Ligne. Tous droits réservés.</p>
</footer>

</body>
</html>
