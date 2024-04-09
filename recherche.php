

<style>
        body {
            margin: 0; 
            font-family: Arial, sans-serif; 
            background-color:  #D3C8B0;
            display: flex;
            justify-content: center;
            align-items: center; 
            min-height: 100vh;
        }

        .result-container {
        margin: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;

       
        }

        .result {
        margin-bottom: 20px;
        padding: 10px;
        border-radius: 5px;
        text-align: center; /* Centre tout le texte horizontalement */
        width: 300px; /* Définissez une largeur fixe pour le conteneur */
        display: flex;
        flex-direction: column;
        align-items: center; /* Centre les éléments enfants verticalement et horizontalement */
        gap: 10px; /* Espacement entre les éléments à l'intérieur du conteneur */
        }

        .result h3, .result p {
            margin: 5px 0;
        }

        .result img {
           
            max-width: 100%; 
            height: auto;
            display: block; 
            margin: 0 auto; }

            .result h3, .result p:not(.resume) {
        margin: 5px 0;
    }

    .result .resume {
        text-align: justify; /* Justifier le texte du résumé */
        width: 200%; /* Prendre toute la largeur disponible */
        margin-top: 10px; /* Espace au-dessus du résumé */
    }

        </style>'


<?php
// Connexion à la base de données
$conn = mysqli_connect("localhost", "sarah.lakrouz", "Ls062004****", "arbrealivre");

if (!$conn) {
    die("Connexion échouée: " . mysqli_connect_error());
}

// Vérifier si le formulaire de recherche a été soumis
if (isset($_POST['search'])) {
    // Nettoyer les données de recherche pour éviter les attaques par injection SQL
    $search = mysqli_real_escape_string($conn, $_POST['search']);

    // Requête SQL pour rechercher les livres correspondants
    $sql = "SELECT * FROM livres WHERE Titre LIKE '%$search%' OR auteur LIKE '%$search%'";

    // Exécuter la requête SQL
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        echo "Erreur SQL : " . mysqli_error($conn);
    }

    // Affichage du CSS

    // Vérifier s'il y a des résultats
    if (mysqli_num_rows($result) > 0) {
        // Afficher les résultats
        echo '<div class="result-container">';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="result">';
            echo "<h3>".$row["Titre"]."</h3>";
            echo "<img src='".$row["image"]."' alt='".$row["Titre"]."'>";
            echo "<p>".$row["auteur"]."</p>";
            echo "<p>".$row["Prix"]."€"."</p>";
            echo "<p class='resume'>".$row["Resume"]."</p>";
           
            echo '</div>';
        }
        echo '</div>';
    } else {
        echo "<p>Aucun résultat trouvé pour votre recherche.</p>";
    }
}

// Fermer la connexion à la base de données
mysqli_close($conn);
?>