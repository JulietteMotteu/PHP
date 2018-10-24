<?php
/*2. Créez un formulaire où l'on peut remplir son âge et l'envoyer et un script PHP qui affiche 'Vous êtes né(e) en (1976)'.
Ceci n'a pas besoin d'être précis au jour près (année actuelle - année de naissance).

Mini Challenge : rendez l'année cliquable via un <a href> qui point vers la bonne page Wikipedia.
Tips : les pages wikipedia des années sont toujours au format https://en.wikipedia.org/wiki/1976

Challenge : Assurez-vous que ce script fonctionnera l'année prochaine et les suivantes aussi.
Tips : date()

Hardcore : Le formulaire accepte une date de naissance et le calcul se base sur la date du jour
Tips : DateTime::diff()*/
$msg = '';

// Pour la version année
if(isset($_POST['age'])) {
    $annee = date('Y') - $_POST['age'];
    $msg = 'Vous êtes né en <a href="https://en.wikipedia.org/wiki/'.$annee.'">'.$annee.'</a>';
}


// Version hardcore
$msg2 = '';


if(isset($_POST['naissance'])) {
    $dateActuelle = new DateTime();
    $dateNaissance = new DateTime($_POST['naissance']);
    $age = $dateNaissance->diff($dateActuelle);
    $msg2 = $age->format('Vous avez %y ans, %m mois et %d jours');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exo 2</title>
</head>
<body>
   <h1></h1>
   
   <form action="" method="post">
       <!-- Version simple-->
       <label for="age">Entrez votre âge</label>
       <input type="number" name="age">
       
       <p>
           <?php 
                echo $msg;
           ?>
       </p>
       
       
   </form>
    
    <form action="" method="post">
    <!-- Version hardcore-->
        <label for="naissance">Date de naissance</label>
        <input type="date" name="naissance">
        <button type="submit">Envoyer</button>
        <p>
        <?php
            echo $msg2;
        ?>
        </p>
    </form>
</body>
</html>