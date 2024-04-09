<?php
$servername = "localhost";
$username = "sarah.lakrouz";
$password = "Ls062004****";
$dbname = "arbrealivre";

// Créer une connexion
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Vérifier la connexion
if (!$conn) {
    die("Connexion échouée: " . mysqli_connect_error());
}
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {

// Récupérer les données du formulaire
    $isbn = $_POST['ISBN'];
    $titre = $_POST['Titre'];
    $genre = $_POST['genre'];
    $edition = $_POST['edition'];
    $publication = $_POST['date_de_publication'];
    $nombrepages = $_POST['Nombre_de_pages'];
    $langue = $_POST['Langue'];
    $resume = $_POST['Resume'];
    $prix = $_POST['Prix'];

   

// Requête SQL pour insérer des données
$sql = ("INSERT INTO livres(`ISBN`, `Titre`, `genre`, `edition`, `date_de_publication`, `Nombre_de_pages`,`Langue`,`Resume`,`Prix`)  
 VALUES ('$isbn', '$titre', '$genre', '$edition', '$publication', '$nombrepages', '$langue', '$resume', '$prix')");

// Exécuter la requête
if (mysqli_query($conn, $sql)) {
    echo "Livre ajouté avec succès.";
} else {
    echo "Erreur lors de l'ajout du livre : " . mysqli_error($conn);
}

// Fermer la connexion
mysqli_close($conn);
}
?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Administrateur</title>
    <style>
    body {
            font-family: Arial, sans-serif;
            background-color: #D3C8B0;
            margin: 0;
            padding: 0;
            text-align: center; /* Centrer le texte */
        }

        h1 {
            margin-top: 20px; /* Ajouter un espace au-dessus du titre */
        }

        form {
            max-width: 500px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            text-align: left; /* Aligner les labels à gauche */
        }
        input[type="number"] {
    -moz-appearance: textfield; /* Firefox */
    appearance: textfield; /* Safari et Chrome */
}

/* Supprimer les flèches de contrôle pour Webkit (Safari, Chrome) */
input[type="number"]::-webkit-inner-spin-button,
input[type="number"]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
}
</style>
</head>
<body>
    <h1>Formulaire - Base de données</h1>
    <form method="POST" action="">
        <label for="ISBN">ISBN :</label>
        <input type="number" name="ISBN" id="ISBN" required>
        
        <label for="Titre">Titre :</label>
        <input type="text" name="Titre" id="Titre" required>
        
        <label for="genre">Genre :</label>
        <input type="text" name="genre" id="genre" required>
        
        <label for="edition">edition :</label>
        <input type="text" name="edition" id="edition" required>
        
        <label for="date_de_publication">date de publication :</label>
        <input type="date" name="date_de_publication" id="date_de_publication" required>
        
        <label for="Nombre_de_pages">Nombre de pages :</label>
        <input type="number" name="Nombre_de_pages" id="Nombre_de_pages" required>
        
        <label for="langue">Langue :</label>
        <input type="text" name="Langue" id="Langue" required>
        
        <label for="Resume">Résumé :</label>
        <textarea name="Resume" id="Resume" cols="25" rows="8" required></textarea>
        
        <label for="Prix">Prix :</label>
        <input type="number" name="Prix" id="Prix" required>
        
        <input type="submit" name="Ajouter" value="Ajouter">
    </form>
</body>
</html>