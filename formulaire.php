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

// Récupérer les données du formulaire
if(isset($_POST['ISBN'])){
    $isbn = $_POST['ISBN'];
    $titre =mysqli_real_escape_string($conn, $_POST['Titre']);
    $auteur= mysqli_real_escape_string($conn, $_POST['auteur']);
    $genre = mysqli_real_escape_string($conn, $_POST['genre']);
    $edition =mysqli_real_escape_string($conn, $_POST['edition']);
    $publication = $_POST['date_de_publication'];
    $nombrepages = $_POST['Nombre_de_pages'];
    $langue = $_POST['Langue'];
    $resume = mysqli_real_escape_string($conn, $_POST['Resume']);
    $prix = $_POST['Prix'];

    if (!strlen($isbn) === 6 && !ctype_digit($isbn)) {
        // ISBN valide
        echo "ISBN valide.";
    }
    
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $image =mysqli_real_escape_string($conn, $_FILES["image"]["name"]);
        // Votre logique de traitement d'image ici
    } else {
        // Gérer l'erreur ou l'absence de fichier
   
    }
    $quantite = (int)$_POST['quantité'];
    
   

// Requête SQL pour insérer des données
$sql = ("INSERT INTO livres(`ISBN`, `Titre`, `auteur`, `genre`, `edition`, `date_de_publication`, `Nombre_de_pages`,`Langue`,`Resume`,`Prix`, `quantité`,`image`)  
 VALUES ('$isbn', '$titre', '$auteur', '$genre', '$edition', '$publication', '$nombrepages', '$langue', '$resume', '$prix','$quantite','$image')");

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

        input[type="text"],
        input[type="number"],
        input[type="date"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box; /* Pour inclure le padding et le bord dans la largeur totale */
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        textarea {
            resize: vertical; /* Autoriser uniquement le redimensionnement vertical */
        }
</style>
</head>
<body>
    <h1> Espace Administrateur </h1>
    <form method="POST" action="formulaire.php" enctype="multipart/form-data">
        <label for="ISBN">ISBN :</label>
        <input type="number" name="ISBN" id="ISBN" required>
        
        <label for="Titre">Titre :</label>
        <input type="text" name="Titre" id="Titre" required>

        <label for="auteur"> Auteur : </label>
        <input type ="text" name="auteur" id="auteur" required> 

        <label for="genre">Genre :</label>
        <input type="text" name="genre" id="genre" required>
        
        <label for="edition">Edition :</label>
        <input type="text" name="edition" id="edition" required>
        
        <label for="date_de_publication">Date de publication :</label>
        <input type="date" name="date_de_publication" id="date_de_publication" required>
        
        <label for="Nombre_de_pages">Nombre de pages :</label>
        <input type="number" name="Nombre_de_pages" id="Nombre_de_pages" required>
        
        <label for="Langue">Langue :</label>
        <select id="Langue" name="Langue" required>
                    <option value="français">Français</option>
                    <option value="anglais">Anglais</option>
                    <option value="espagnol">Espagnol</option>
                </select>
        
        <label for="Resume">Résumé :</label>
        <textarea name="Resume" id="Resume" cols="25" rows="8" required></textarea>
        
        <label for="Prix">Prix :</label>
        <input type="number" name="Prix" id="Prix" required>

        <label for="quantité"> Quantité : </label>
        <input type="number" name="quantité" required>

        <label for="image">Sélectionnez une image :</label>
        <input type="file" name="image" id="image" accept="image/*"><br>
        <input type="submit" name="Ajouter" value="Ajouter">
    </form>
</body>
</html>