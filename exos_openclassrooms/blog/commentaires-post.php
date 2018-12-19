<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=test', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e) {
    die ('Erreur : ' . $e->getMessage());
}

$statement = $bdd->prepare('INSERT INTO commentaires VALUES ("", :id_billet, :auteur, :commentaire, NOW())');
/*$statement->bindValue(':id_billet', );*/
$statement->bindValue(':auteur', $_POST['auteur'], PDO::PARAM_STR);
$statement->bindValue(':commentaire', $_POST['message'], PDO::PARAM_STR);
$statement->execute();