<?php

$serveur = "localhost";
$utilisateur = "root";
$mot_de_passe = "root";
$base_de_donnees = "annuaire";

$conn = new mysqli($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);

if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}

$nom = $_POST["nom"] ?? "";
$prenom = $_POST["prenom"] ?? "";
$email = $_POST["email"] ?? "";
$telephone = $_POST["telephone"] ?? "";
$specialites = $_POST["specialites"] ?? ""; 

$stmt = $conn->prepare("INSERT INTO donnees (nom, prenom, email, telephone, specialites) VALUES (?,?,?,?,?)");
$stmt->bind_param("sssss", $nom, $prenom, $email, $telephone, $specialites);

if ($stmt->execute() === TRUE){ 
    echo "Vous avez été enregistré avec succès !";
} else {
    echo "Nous n'avons pas réussi à vous enregistrer veuillez réessayer." . $stmt->error;
}

$stmt->close();
$conn->close();

?>