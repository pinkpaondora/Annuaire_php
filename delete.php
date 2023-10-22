<?php

$serveur = "localhost";
$utilisateur = "root";
$mot_de_passe = "root";
$base_de_donnees = "annuaire";

$conn = new mysqli($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);

if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}

// Vérifiez si un ID valide a été transmis via GET
if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
    $id = $_GET["id"];

    // Utilisez une requête préparée pour supprimer les données
    $stmt = $conn->prepare("DELETE FROM donnees WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Redirigez l'utilisateur vers la page d'administration après la suppression
        header("Location: admin.php");
    } else {
        echo "Erreur de suppression : " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "ID invalide ou manquant.";
}

$conn->close();

?>