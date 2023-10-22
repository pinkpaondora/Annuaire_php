<!DOCTYPE html>
<html>
<link rel="stylesheet" href="main.css"> 
<head>
    <title>Annuaire</title>
</head>
<body>
    <h1>Bienvenue</h1>

    <div id="boutonaccueil">
    <button class="save"><a href="register.php">Ajouter un contact</a></button>
    <button class="save"><a href="admin.php">Admin</a></button>
</div>

    <form method="get" class="search">
        <input type="text" name="recherche" placeholder="Rechercher..." />
        <input type="submit" value="Rechercher" />
    </form>

    
    <table>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Téléphone</th>
            <th>Spécialités</th>
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

        
        if (isset($_GET['recherche'])) {
            $recherche = $_GET['recherche'];
            $recherche = mysqli_real_escape_string($conn, $recherche); 
            
            $sql = "SELECT * FROM donnees WHERE nom LIKE '%$recherche%' OR prenom LIKE '%$recherche%'";
            $resultat = $conn->query($sql);

            if ($resultat->num_rows > 0) {
                while ($row = $resultat->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["nom"] . "</td>";
                    echo "<td>" . $row["prenom"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["telephone"] . "</td>";
                    echo "<td>" . $row["specialites"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Aucun résultat trouvé.</td></tr>";
            }
        }
        $conn->close();
        ?>
    </table>


<form method="post" action="accueil.php">
<?php
$serveur = "localhost";
$utilisateur = "root";
$mot_de_passe = "root";
$base_de_donnees = "annuaire";

$conn = new mysqli($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);

if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}

$specialite = isset($_POST["specialites"]) ? $_POST["specialites"] : "";

if (!empty($specialite)) {
    $sql = "SELECT * FROM donnees WHERE specialites = '$specialite'";
} else {
    $sql = "SELECT * FROM donnees";
}

$resultat = $conn->query($sql);
?>
    <button type="submit" name="specialites" value="communication graphique" class="filtres">Communication Graphique</button>
    <button type="submit" name="specialites" value="communication digitale" class="filtres">Communication Digitale</button>
    <button type="submit" name="specialites" value="developpement web" class="filtres">Développement Web</button>
    <button type="submit" name="specialites" value="marketing digital" class="filtres">Marketing Digital</button>
</form>
    <table>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Téléphone</th>
            <th>Spécialités</th>
        </tr>
        <?php
        if ($resultat->num_rows > 0) {
            while ($row = $resultat->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["nom"] . "</td>";
                echo "<td>" . $row["prenom"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["telephone"] . "</td>";
                echo "<td>" . $row["specialites"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Aucun enregistrement trouvé.</td></tr>";
        }
        ?>
    </table>

    <?php
    $conn->close();
    ?>
</body>
</html>

