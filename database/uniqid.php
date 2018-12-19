<?php

//Insertion d'un nouvel ID unique dans la DB
do {
    $monTrucUnique : md5(microtime());
    
    $statement = $pdo->prepare('INSERT INTO maTable (uniqid) VALUES (:uniqid)');
    $statement->bindValue(':uniqid', $monTrucUnique, PDO::PARAM_STR);
    $statement->execute();
} while ($pdo->errorInfo()[0] != 0000);

?>