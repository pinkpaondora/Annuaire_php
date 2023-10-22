<!DOCTYPE html>
<html>
<head>
    <title>Modifier</title>
</head>
<body>
    <h1>Modifier vos données</h1>
    <form method="post" action="traitement_modifs.php">

        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="text" name="nom" placeholder="Nom">
        <input type="text" name="prenom" placeholder="Prénom">
        <input type="text" name="email" placeholder="Email">
        <input type="text" name="telephone" placeholder="Téléphone">
    
        <input type="submit" value="Enregistrer la modification">
    </form>
</body>
</html>