<?php
if(isset($_GET['ISBN'])) {
    $isbn = $_GET['ISBN'];

    // Connexion à la base de données
    $conn = mysqli_connect("localhost", "sarah.lakrouz", "Ls062004****", "arbrealivre");

    // Vérifier la connexion
    if (!$conn) {
        die("Connexion échouée: " . mysqli_connect_error());
    }

    // Requête pour supprimer le livre
    $sql = "DELETE FROM livres WHERE ISBN = '$isbn'";

    if (mysqli_query($conn, $sql)) {
        echo "Livre supprimé avec succès.";
    } else {
        echo "Erreur lors de la suppression : " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
