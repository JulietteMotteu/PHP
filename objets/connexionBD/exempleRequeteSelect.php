<?php
// inclure la config
include "./config/db.php";

// 1. Créer la connexion
try {
	$bdd = new PDO(DBDRIVER.':host='.DBHOST.';port='.DBPORT.
		';dbname='.DBNAME.';charset='
		.DBCHARSET,DBUSER,DBPASS); 
}
catch (Exception $e){
	die ('Erreur: '.$e->getMessage());
}

// 2. Créer une requête (variable string)
$sql = 'SELECT * FROM t_langage WHERE dateCreation > :uneAnnee';
// 3. Préparer la requête (l'envoyer au serveur)
$statement = $bdd->prepare($sql);
var_dump($statement);
// 4. Donner une valeur aux paramétres
$statement->bindValue(":uneAnnee", 1990, PDO::PARAM_INT);
// 5. Lancer la requête dans le serveur
$statement->execute();
// 6. Obtenir le résultat de la requête dans un
// tableau indexé qui contient des tableaux associatifs
$tableau = $statement->fetchAll();
var_dump($tableau);

foreach ($tableau as $key => $uneLigne) {
    foreach ($uneLigne as $colonne => $valeur) {
        echo $colonne . ": " . $valeur . "<br>";

    }
}
?>
	
