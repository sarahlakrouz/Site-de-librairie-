<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des livres</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #b3a791;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        a {
            text-decoration: none;
            color: #007bff;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="container">
<?php
// Connexion à la base de données
$conn = mysqli_connect("localhost", "sarah.lakrouz", "Ls062004****", "arbrealivre");

// Vérifier la connexion
if (!$conn) {
    die("Connexion échouée: " . mysqli_connect_error());
}

// Requête pour récupérer tous les livres
$sql = "SELECT * FROM livres";
$result = mysqli_query($conn, $sql);

echo "<table border='1'>";
echo "<tr><th>ISBN</th><th>Titre</th><th>Genre</th><th>Actions</th></tr>";
if (mysqli_num_rows($result) > 0) {
    // Affichage de chaque enregistrement
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$row["ISBN"]."</td>";
        echo "<td>".$row["Titre"]."</td>";
        echo "<td>".$row["genre"]."</td>";
        echo "<td><a href='modification.php?ISBN=".$row["ISBN"]."'>Modifier</a> | <a href='#' onclick=\"confirmerSuppression('".$row["ISBN"]."')\">Supprimer</a></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>Aucun livre trouvé</td></tr>";
}
echo "</table>";

mysqli_close($conn);
?>
</div>
<script>
function confirmerSuppression(isbn) {
    var confirmation = confirm("Êtes-vous sûr de vouloir supprimer ce livre ?");
    if (confirmation) {
        // Si l'utilisateur confirme, rediriger vers le script de suppression avec l'ISBN en paramètre
        window.location.href = 'supprimer.php?ISBN=' + isbn;
    }
}
</script>
</body>
</html>

