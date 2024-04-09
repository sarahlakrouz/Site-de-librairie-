
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
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Récupérer les données du formulaire
$username = $_POST['ID_user'];
$nom= $_POST['nom'];
$prenom = $_POST['prenom'];
$sexe= $_POST['sexe'];
$telephone = $_POST['telephone'];
$email= $_POST['email'];
$mdp= $_POST['motdepasse'];
$adresse_livraison= $_POST['adresse_livraison'];
$adresse_facturation= $_POST['adresse_facturation'];

if (!preg_match('/^[A-Z][a-z]$/', $nom)) {
    echo "Le nom doit commencer par une majuscule et ne contenir que des lettres."."<br>";
}
elseif (!preg_match('/^[A-Z][a-z]$/', $prenom)){
    echo "Le prénom doit commencer par une majuscule et ne contenir que des lettres."."<br>";
}

if (strlen($mdp) <= 8) {
    echo "Le mot de passe doit contenir au moins 8 caractères."."<br>";
} elseif (!preg_match('/[A-Z]/', $mdp) OR !preg_match('/[a-z]/', $mdp) OR !preg_match('/[0-9]/', $mdp)) {
    echo"Le mot de passe doit contenir au moins une lettre majuscule, une lettre minuscule et un chiffre."."<br>";
}

if (!is_numeric($telephone) OR strlen($telephone) !== 10 OR substr($telephone, 0, 1) !== "0" ) {
    echo"Le numéro de téléphone n'est pas valide"."<br>";
}

$user = "SELECT * FROM client WHERE ID_user = '$username'";
$res = $conn->query($user);

// Vérifier si la requête a retourné des résultats (si le nom d'utilisateur existe déjà)
if ($res->num_rows > 0) {
    echo "Nom d'utilisateur déjà existant.";
} else {
    echo ""; // Aucun message si le nom d'utilisateur n'existe pas
}

// Requête SQL pour insérer des données
$sql = ("INSERT INTO client(`ID_user`, `nom`, `prenom`, `sexe`, `telephone`, `email`,`motdepasse`,`adresse_livraison`,`adresse_facturation`)  
VALUES ('$username', '$nom', '$prenom', '$sexe', '$telephone', '$email', '$mdp', '$adresse_livraison', '$adresse_facturation')");

// Exécuter la requête
if (mysqli_query($conn, $sql)) {
echo "Inscription réalisée.";
} else {
echo "Erreur lors de l'inscription: " . mysqli_error($conn);
}
 }

// Fermer la connexion
mysqli_close($conn);
?>

<html> 
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inscription</title>
        <style>
            
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #b3a791;
            
        }

        .container {
            max-width: 800px; /* Largeur maximale du formulaire */
            width: 80%;
            height: 95%;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            font-family: "Yanone Kaffeesatz", sans-serif;
            font-optical-sizing: auto;
            font-weight: weight;
            font-style: normal;
            font-style: normal;
            color: #e0cdba;
        }

        .container h2 {
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input[type="text"],
        .form-group input[type="tel"],
        .form-group input[type="email"],
        .form-group input[type="password"],
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        .form-group input[type="submit"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: none;
            background-color: #16786A;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .form-group input[type="submit"]:hover {
            background-color: rgb(225, 216, 197);
        }

    </style>
</head>
<body>
    <div class="container">
        <h2>Inscription</h2>
        <form  method="POST" action="">

            <div class="form-group">
                <label for="ID_user">Numéro d'utilisateur :</label>
                <input type="number" id="ID_user" name="ID_user" required>
            </div>
            <div class="form-group">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" required>
            </div>
            <div class="form-group">
                <label for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom" required>
            </div>
            <div class="form-group">
                <label for="sexe">Sexe :</label>
                <select id="sexe" name="sexe" required>
                    <option value="homme">Homme</option>
                    <option value="femme">Femme</option>
                    <option value="autre">Autre</option>
                </select>
            </div>
            <div class="form-group">
                <label for="telephone">N° Téléphone :</label>
                <input type="tel" id="telephone" name="telephone" required>
            </div>
            <div class="form-group">
                <label for="email">Adresse e-mail :</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="motdepasse">Mot de passe :</label>
                <input type="password" id="motdepasse" name="motdepasse" required>
            </div>
            <div class="form-group">
                <label for="adresse_livraison">Adresse de livraison :</label>
                <textarea id="adresse_livraison" name="adresse_livraison" required></textarea>
            </div>
            <div class="form-group">
                <label for="adresse_facturation">Adresse de facturation :</label>
                <textarea id="adresse_facturation" name="adresse_facturation" required></textarea>
            </div>
            <div class="form-group">
                <input type="submit" value="S'inscrire">
            </div>
        </form>
    </div>
</body>
</html>