
<style>
        /* Style de base pour la mise en forme */
        body {
            margin: 0; /* Supprime les marges par défaut */
            font-family: Arial, sans-serif; /* Police de caractère */
            background-color: #D3C8B0;
        }
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background-color: #D3C8B0; /* Couleur de fond pour distinguer l'en-tête */
        }
        .search-container {
            display: flex;
            align-items: center;
        }
        .search-container input[type="text"] {
            font-size: 16px;
            padding-left: 30px;
            padding-right: 30px;
            padding-top: 5px;
            padding-bottom: 5px;
            border: none; /* Supprime la bordure */
            margin-right: 10px; /* Espacement entre l'input et le bouton */
            border-radius: 10px; /* Bords arrondis pour l'input */
            outline: none; /* Supprime le contour au focus */
        }
        .search-container button {
            padding: 5px 10px;
            border: none; /* Supprime la bordure */
            border-radius: 10px; /* Bords arrondis pour le bouton */
            cursor: pointer; /* Change le curseur */
            color: white; /* Couleur du texte */
        }
        .login-logo img, .cart-logo img {
           
            object-fit: contain; /* Assure que l'image s'adapte correctement sans être déformée */
        }

        .navbar {
            background-color : #16786A;
            display: flex;
            justify-content: space-around;
            align-items: center;
            color: white;
            margin-top: 10px; /* Espace entre l'en-tête et la barre de navigation */
        }

        .navbar a {
            color: white;
            padding: 14px 20px;
            text-decoration: none;
            text-align: center;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        #titre{
            color:#16786A;
            font-family: "Yuji Syuku", serif;
            font-weight: 600;
            font-style: normal;
            padding-left: 2%;
        }
        .container {
        width: 90%;
        margin: 50px auto;
        }
        .livres-container {
    display: flex;
    flex-wrap: wrap; /* Permet aux éléments de passer à la ligne suivante */
    justify-content: flex-start; /* Alignement des éléments */
    gap: 10px; /* Espace entre les éléments */
    padding: 20px; /* Espace autour du conteneur */
     }

/* Style pour chaque livre */
.livre {
    
    padding: 10px; /* Espace à l'intérieur de chaque livre */
    width: 200px; /* Largeur de chaque livre */
    text-align: center; /* Centrer le texte à l'intérieur du livre */
    border-radius: 10px; /* Bords arrondis */
    background-color: transparent; /* Couleur de fond pour chaque livre */
    text-align: center;
    align-items: center;
    display: flex;
    flex-direction: column;
}

.livre img {
    width: 100%; /* Faire en sorte que l'image prenne toute la largeur du livre */
    height: auto; /* Garder le ratio de l'image */
    border-radius: 5px; /* Bords arrondis pour l'image */
    margin-bottom: 20px; /* Espace sous l'image */
}

/* Style pour le texte dans chaque livre */
.livre p {
    margin: 10px 0; /* Espace vertical pour le texte */
}

footer {
            background-color: #16786A; /* Couleur de fond */
            color: #fff; /* Couleur du texte */
            padding: 5px; /* Espacement intérieur */
            text-align: center; /* Alignement du texte au centre */
            position: relative; /* Position fixe en bas */
            bottom: 0; /* Alignement en bas de la page */
            width: 100%; /* Pleine largeur */
        }
        
        
    </style>     
<body>
    <header>
        <h1 id="titre">L'arbre à livres</h1>
        <form method="POST" action="recherche.php">
            <div class="search-container">
                <input type="text" name="search" placeholder="Quel livre cherchez-vous ?">
                <button type="submit" style ="background-color: transparent;">
                    <img src="symbole-de-linterface-de-recherche.png" alt="Rechercher" style="width: 24px; height: 24px;">
                </button>
        </div>
        </form>
        <div style="display:flex; flex-direction: row; padding:12px;">
        <a href="espaces.html" class="login-logo" target="_blank"> <img src="compte.png" alt="Connexion/Inscription" style="margin-right: 10px;" >
            
            <img src="panier.png" alt="Panier"></a>
            
        </div>
        </header>
    
    
    <div class="navbar">
        <a href="index.html">Accueil</a>
        <a href="FAQ.html">FAQ</a>
        <a href="cat.php">Catalogue</a>
        <a href="box.html"> Box de livres </a>
    </div>
   

<?php

// Connexion à la base de données
$servername = "localhost";
$username = "sarah.lakrouz";
$password = "Ls062004****";
$dbname = "arbrealivre";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}

// Requête pour récupérer les informations des livres
$sql = "SELECT Titre, auteur, Prix, image FROM livres";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<div class='livres-container'>"; // Conteneur flex pour les livres
    // Afficher les données de chaque livre
    while($row = $result->fetch_assoc()) {
        echo "<div class='livre'>";
        echo "<img src='" . htmlspecialchars($row["image"]) . "' alt='Image de " . htmlspecialchars($row["Titre"]) . "' style='width:100px; height:auto;'>"; // Assurez-vous que le chemin de l'image est correct
        echo  htmlspecialchars($row["Titre"]) . "</p>";
        echo   htmlspecialchars($row["auteur"]) . "</p>";
        echo  htmlspecialchars($row["Prix"]) . "€</p>";
        echo "</div>";
        
    }
} else {
    echo "0 livre trouvé";
}
echo "</div>";
        
$conn->close();
?>

<footer style ="margin-top: 30px;">
    <p>&copy; 2024 L'arbre à livres. Tous droits réservés.</p>
</footer>
