<?php
/*
10. Créez 2 pages : 
La première liste toutes les entrées d'une DB avec un lien dynamique avec un id passé en GET (par ex. detail.php?id=42).
La deuxième contient un formulaire prérempli (input + menu déroulant + checkbox) avec les données obtenues via GET et permet une mise à jour de ces valeurs dans la DB.


---

Challenge : Vérifiez la validité du paramètre en GET (Primary Key donc un chiffre entier positif)

Hardcore : Vérifiez la validité du paramètre en GET (uniquement une PK qui existe dans la  DB + redirection en cas de problème)
Tips : header() + ob_start() + ob_flush()
*/

require_once("./config2.php");

try {
    $pdo = new PDO(MYSQL_DSN, DB_USER, DB_PWD);
} catch (PDOException $e) {
    echo $e->getMessage();
    $pdo = null;
    die();
    //header('location: 404.html')
}

$statement = $pdo->query('SELECT id, name FROM t_langage');

if ($statement === false) {
    die("Problème technique");
}
else {
    $listeLangage = $statement->fetchAll(PDO::FETCH_ASSOC);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exo 10</title>
</head>
<body>
    <ul>
        <?php
            
        for ($i=0; $i<count($listeLangage); $i++) {
            echo '<li><a href="exo10detail.php?id=' . $listeLangage[$i]['id'] . '">' . $listeLangage[$i]['name'] . '</a></li>';
        }
        
        ?>
    </ul>
    
</body>
</html>