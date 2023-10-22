<?php

$serveur = "localhost";
$utilisateur = "root";
$mot_de_passe = "root";
$base_de_donnees = "annuaire";

$conn = new mysqli($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);

if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}

$id = $_POST["id"];
$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$email = $_POST["email"];
$telephone = $_POST["telephone"];

if (!empty($id) && !empty($nom) && !empty($prenom) && !empty($email) && !empty($telephone)) {
    $stmt = $conn->prepare("UPDATE donnees SET nom = ?, prenom = ?, email = ?, telephone = ? WHERE id = ?");
    $stmt->bind_param("ssssi", $nom, $prenom, $email, $telephone, $id);

    if ($stmt->execute()) {
        header("Location: admin.php");
    } else {
        echo "Erreur de mise à jour : " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Veuillez remplir tous les champs.";
}

$conn->close();


$id = $_POST["id"];
$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$email = $_POST["email"];
$telephone = $_POST["telephone"];

echo "ID : " . $id;
echo "Nom : " . $nom;
echo "Prénom : " . $prenom;
echo "Email : " . $email;
echo "Téléphone : " . $telephone;

if (!empty($id) && !empty($nom) && !empty($prenom) && !empty($email) && !empty($telephone)) {
    $stmt = $conn->prepare("UPDATE donnees SET nom = ?, prenom = ?, email = ?, telephone = ? WHERE id = ?");
    $stmt->bind_param("ssssi", $nom, $prenom, $email, $telephone, $id);

    if ($stmt->execute()) {
        header("Location: admin.php");
    } else {
        echo "Erreur de mise à jour : " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Veuillez remplir tous les champs.";
}

$conn->close();

?>