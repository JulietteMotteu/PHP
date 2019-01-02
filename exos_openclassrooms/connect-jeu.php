<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=oc', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e) {
    die ('Erreur : ' . $e->getMessage());
}
if(isset($_GET['console'])) {
    $statement = $bdd->prepare('SELECT * FROM jeux_video WHERE console = ?') or die(print_r($bdd->errorInfo()));
    $statement->execute(array($_GET['console']));
    $reponse = $statement->fetchAll();
    foreach($reponse as $ligne){
        echo '<p>' . $ligne['console'] . ' - ' . $ligne['nom'] . '</p>';
    } 
    // Quand on a terminé le traitement sur la requête, on ferme le curseur d'analyse de la requête pour que ça ne pose pas de problèmes à la requête suivante.
    $statement->closeCursor();
}
?>