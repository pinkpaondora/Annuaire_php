<?php
$serveur = "localhost";
$utilisateur = "root";
$mot_de_passe = "root";
$base_de_donnees = "annuaire";

$conn = new mysqli($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);

if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}


if (isset($_GET['recherche'])) {
    $recherche = $_GET['recherche'];
    $recherche = mysqli_real_escape_string($conn, $recherche); 
    
    $sql = "SELECT * FROM donnees WHERE nom LIKE '%$recherche%' OR prenom LIKE '%$recherche%'";
    $resultat = $conn->query($sql);

    if ($resultat->num_rows > 0) {
        echo "<h2>Résultats de recherche :</h2>";
        while ($row = $resultat->fetch_assoc()) {
            echo "Nom : " . $row["nom"] . " - Prénom : " . $row["prenom"] . "<br>";
        }
    } else {
        echo "Aucun résultat trouvé.";
    }
}

$conn->close();
?>