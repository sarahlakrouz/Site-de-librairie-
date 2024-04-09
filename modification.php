<?php
$servername = "localhost";
$username = "sarah.lakrouz";
$password = "Ls062004****";
$dbname = "arbrealivre";

// Connexion à la base de données
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connexion échouée: " . mysqli_connect_error());
}

// Vérifier si le formulaire a été soumis pour la mise à jour
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['mise_a_jour'])) {
    // Échappement des valeurs pour éviter les injections SQL
    $isbn = mysqli_real_escape_string($conn, $_POST['ISBN']);
    $titre = mysqli_real_escape_string($conn, $_POST['Titre']);
    $genre = mysqli_real_escape_string($conn, $_POST['genre']);
    $auteur = mysqli_real_escape_string($conn, $_POST['auteur']);
    $edition = mysqli_real_escape_string($conn, $_POST['edition']);
    $date_de_publication = mysqli_real_escape_string($conn, $_POST['date_de_publication']);
    $nombre_de_pages = (int)$_POST['Nombre_de_pages'];
    $resume = mysqli_real_escape_string($conn, $_POST['Resume']);
    $prix = (float)$_POST['Prix'];
    $langue = mysqli_real_escape_string($conn, $_POST['Langue']);
    $quantite = (int)$_POST['quantité'];

    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $image = mysqli_real_escape_string($conn, $_FILES["image"]["name"]);
        // Votre logique de traitement d'image ici
    } else {
        // Gérer l'erreur ou l'absence de fichier
   
    }

    // Construction et exécution de la requête SQL de mise à jour
    $sql_update = "UPDATE livres SET 
        Titre='$titre', genre='$genre', auteur='$auteur', edition='$edition',
        date_de_publication='$date_de_publication', Nombre_de_pages='$nombre_de_pages',
        Resume='$resume', Prix='$prix', Langue='$langue', quantité='$quantite', image='$image'
        WHERE ISBN='$isbn'";

    if (mysqli_query($conn, $sql_update)) {
        echo "Livre mis à jour avec succès.";
    } else {
        echo "Erreur lors de la mise à jour : " . mysqli_error($conn);
    }
}

// Affichage du formulaire pour un ISBN spécifié via GET ou après une tentative de mise à jour POST
if (isset($_GET['ISBN']) || (isset($_POST['ISBN']) && !isset($_POST['mise_a_jour']))) {
    $isbn = isset($_GET['ISBN']) ? $_GET['ISBN'] : $_POST['ISBN'];
    $isbn = mysqli_real_escape_string($conn, $isbn); // Échappement de l'ISBN pour sécurité

    // Requête pour récupérer les détails du livre
    $sql = "SELECT * FROM livres WHERE ISBN = '$isbn'";
    $result = mysqli_query($conn, $sql);
    echo mysqli_error($conn);

    if ($row = mysqli_fetch_assoc($result)) {
        // Formulaire HTML pré-rempli avec les données du livre
?>
        <form action="modification.php" method="POST" enctype="multipart/form-data">
        <label for="ISBN">ISBN:</label>
        <input type="number" name="ISBN" value="<?php echo $row['ISBN']; ?>">
            <label for="Titre">Titre:</label>
            <input type="text" name="Titre" value="<?php echo $row['Titre']; ?>"><br>
            <label for="genre">Genre:</label>
            <input type="text" name="genre" value="<?php echo $row['genre']; ?>"><br>
            <label for="auteur">Auteur:</label>
            <input type="text" name="auteur" value="<?php echo $row['auteur']; ?>"><br>
            <label for="edition">Edition:</label>
            <input type="text" name="edition" value="<?php echo $row['edition']; ?>"><br>
            <label for="date_de_publication">Date de publication:</label>
            <input type="date" name="date_de_publication" value="<?php echo $row['date_de_publication']; ?>"><br>
            <label for="Nombre_de_pages">Nombre de pages:</label>
            <input type="number" name="Nombre_de_pages" value="<?php echo $row['Nombre_de_pages']; ?>"><br>
            <label for="Resume">Resume:</label>
            <input type="Resume" name="Resume" value="<?php echo $row['Resume']; ?>"><br>
            <label for="Prix">Prix:</label>
            <input type="number" name="Prix" value="<?php echo $row['Prix']; ?>"><br>
            <label for="Langue">Langue :</label>
            <select id="Langue" name="Langue" value="<?php echo $row['Langue']; ?>"><br>
                    <option value="français">Français</option>
                    <option value="anglais">Anglais</option>
                    <option value="espagnol">Espagnol</option>
                </select>
                <br>
            <label for="quantité">Quantité:</label>
            <input type="number" name="quantité" value="<?php echo $row['quantité']; ?>"><br>
            <label for="image">Sélectionnez une image :</label>
            <input type="file" name="image" id="image" accept="image/*" value="<?php echo $row['image']; ?>"><br>

            <input type="submit" name="mise_a_jour" value="Mettre à jour">
    
        </form>
<?php
    } else {
        echo "Aucun livre trouvé avec cet ISBN.";
    }
}

mysqli_close($conn);
?>