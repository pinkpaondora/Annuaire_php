<!DOCTYPE html>
<html>
<link rel="stylesheet" href="main.css"> 
<head>
    <title>Admin</title>
</head>
<body>
    <h1>Annuaire</h1>

    <table>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Téléphone</th>
            <th>Spécialités</th>
            <th>Actions</th>
        </tr>

        <?php
        $serveur = "localhost";
        $utilisateur = "root";
        $mot_de_passe = "root";
        $base_de_donnees = "annuaire";

        $conn = new mysqli($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);

        if ($conn->connect_error) {
            die("La connexion à la base de données a échoué : " . $conn->connect_error);
        }

        $sql = "SELECT * FROM donnees";
        $resultat = $conn->query($sql);

        if ($resultat->num_rows > 0) {
            while ($row = $resultat->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["nom"] . "</td>";
                echo "<td>" . $row["prenom"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["telephone"] . "</td>";
                echo "<td>" . $row["specialites"] . "</td>";
                echo '<td><a href="modif.php?id=' . $row["id"] . '">Modifier</a> | <a href="delete.php?id=' . $row["id"] . '">Supprimer</a></td>';
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>Aucun enregistrement trouvé.</td></tr>";
        }

        $conn->close();
        ?>
    </table>
</body>
</html>