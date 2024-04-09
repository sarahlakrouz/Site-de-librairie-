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
if (isset($_POST['ID_user']) && isset($_POST['motdepasse'])) {
    $username = $_POST['ID_user'];
    $mdp = $_POST['motdepasse'];

     // Préparer une déclaration SQL pour éviter les injections SQL
     $stmt = mysqli_prepare($conn, "SELECT * FROM client WHERE ID_user = ? AND motdepasse = ?");
     mysqli_stmt_bind_param($stmt, "ss", $username, $mdp);
     mysqli_stmt_execute($stmt);
     $result = mysqli_stmt_get_result($stmt);
 
     if ($result && mysqli_num_rows($result) > 0) {
         echo "Connexion réussie !";
     } else {
         echo "<div class='login-container'>Numéro d'utilisateur ou mot de passe incorrect.</div>";
     }
 } else {
     echo "Veuillez remplir tous les champs.";
 }

?>

<style>
 body {      font-family:arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #b3a791;
            
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

        button{
            border-radius:10px;
        }

        .login-container {
    display: flex;
    flex-direction: column;
    align-items: center; /* Centre les éléments horizontalement */
    justify-content: center; /* Centre les éléments verticalement (si nécessaire) */
    width: 100%; /* Utilisez une largeur spécifique si vous voulez limiter la largeur du formulaire */
}
a.lien-inscription:link, a.lien-inscription:visited {
    color: black; /* Noir */
    text-decoration: none; /* Optionnel */
}
    </style>
 <body>
 <body>
    <div class="login-container">
        <form action="connexion.php" method="post">
            <div class="form-group">
                <label for="ID_user">Numéro d'utilisateur:</label>
                <input type="text" id="ID_user" name="ID_user" required>
            </div>
            <div class="form-group">
                <label for="motdepasse">Mot de passe:</label>
                <input type="password" id="motdepasse" name="motdepasse" required>
            </div>
            <div class="form-group">
                <button class="bouton" type="submit">Connexion</button>
            </div>
        </form>
        <a href="inscription.php" class="lien-inscription">Vous n'avez pas de compte ? Inscrivez-vous ici</a>
    </div>
</body>



</body>