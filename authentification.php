<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication</title>
    <style>
        body{
        font-family: "Yanone Kaffeesatz", sans-serif;
            font-optical-sizing: auto;
            font-weight: weight;
            font-style: normal;
            font-style: normal;
            margin: 0;
            padding: 0;
            background-color: #b3a791;
        }
        .container {
            margin: 100px auto;
            text-align: center;
        }
        .form-container {
            display: inline-block;
            text-align: center;
        }
        
        input[type="password"], input[type="submit"] {
            width: 150px; /* Largeur des champs */
            height: 20px; /* Hauteur des champs */
            font-size: 12px; /* Taille de la police */
            border-radius: 10px;
            border: transparent 1px solid;
            
        }

        input[type="submit"] {
            background-color:white;
        }
        input[type="submit"]:hover {
            background-color: #16786A;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2>Authentification</h2>
            <form method="post" action="authentification.php">
                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" required>
                <br><br>
                <input type="submit" value="Soumettre">
            </form>
        </div>
    </div>
</body>
</html>
<?php
// Vérification du mot de passe
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mot_de_passe_attendu = "SarahEtRim"; // Remplacez par votre mot de passe unique
    
    $mot_de_passe_saisi = $_POST['password'];

    if ($mot_de_passe_saisi === $mot_de_passe_attendu) {
        // Mot de passe correct, rediriger vers la page protégée
        header("Location: page.html");
        exit;
    } else {
        // Mot de passe incorrect, afficher un message d'erreur
        echo "Mot de passe incorrect.";
    }
}
?>