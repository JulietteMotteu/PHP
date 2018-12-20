<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=oc', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e) {
    die ('Erreur : ' . $e->getMessage());
}

if(isset($_GET['id'], $_POST['auteur'], $_POST['message']) && is_int((int)$_GET['id'])) {
    $statement = $bdd->prepare('INSERT INTO commentaires VALUES ("", :id_billet, :auteur, :commentaire, NOW())');
    $statement->bindValue(':id_billet', $_GET['id'], PDO::PARAM_INT);
    $statement->bindValue(':auteur', $_POST['auteur'], PDO::PARAM_STR);
    $statement->bindValue(':commentaire', $_POST['message'], PDO::PARAM_STR);
    $statement->execute();
    var_dump($bdd->errorInfo());
}


header('Location: ./commentaires.php?id=' . $_GET['id']);