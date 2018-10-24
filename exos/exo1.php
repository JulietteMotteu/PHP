<?php
/*    1. Créez un formulaire où l'on peut remplir son prénom et l'envoyer et un script PHP qui affiche 'Bonjour (votre prénom)!' dans un h1.

Mini Challenge : Mettez le formulaire et le script PHP dans la même page sans que cela génère des messages d'erreurs.
Tips : isset()*/

$prenom = '';

if(isset($_POST['prenom'])) {
    $prenom = $_POST['prenom'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exo1</title>
</head>
<body>
    
    <h1><?php echo 'Bonjour ' .$prenom ?></h1>
    
    <form action="" method="post">
        <label for="name">Entrez votre prénom</label>
        <input type="text" name="prenom">
    </form>

</body>
</html>