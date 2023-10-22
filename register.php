<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="main.css">
    <title>S'enregistrer</title>
</head>
<body>
    <button class="save"><a href="accueil.php">Retour à l'annuaire</a></button>
   
    
    <h1>Enregistrez-vous</h1>
    <div class="blocregister">
    <form action="registerConnect.php" method="post" class="box">
        <label for="nom">Nom</label>
        <input type="text" id="nom" name="nom" required />
        <label for="prenom">Prénom</label>
        <input type="text" id="prenom" name="prenom" required />
        <label for="email">Email</label>
        <input type="text" id="email" name="email" required />
        <label for="telephone">Téléphone</label>
        <input type="text" id="telephone" name="telephone" required />
        <label for="specialites">Spécialité</label>
        <select id="specialites" name="specialites">
            <option value="communication graphique">Communication Graphique</option>
            <option value="communication digitale">Communication Digitale</option>
            <option value="developpement web">Développement Web</option>
            <option value="marketing digital">Marketing Digital</option>
</select>

<button type="submit">Enregistrer</button>

</form>
</div>
</body>