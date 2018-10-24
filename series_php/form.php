<!DOCTYPE html>
<?php
require_once('./config.php');

try {
    $pdo = new PDO(MYSQL_DSN, DB_USER, DB_PWD);
} catch (PDOException $e) {
    echo $e->getMessage();  
    $pdo = null;            
    die();                  
}

$msg = '';

if (isset($_POST['nom_serie']) && $_POST['nom_serie'] != '') {
    $statement = $pdo->prepare('SELECT nom, date_sortie 
                                FROM series_netflix 
                                WHERE nom = :nom_serie');
    $statement->bindValue(':nom_serie', $_POST['nom_serie'], PDO::PARAM_STR);
    
    $statement->execute();
    
    $reponse = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    if (count($reponse) > 0){
        $msg = 'La série ' . $reponse[0]['nom'] . " a été créée en " . $reponse[0]['date_sortie'];
    }
    else {
        $msg = 'Désolé, je n\'ai rien trouvé :-(';
    }
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mon premier formulaire</title>
</head>

<body>
   <form action="" method="post">
       <input type="text" name="nom_serie" placeholder="Nom de la série">
       
       <button>Rechercher</button>
       
       <?php 
            echo "<p>" . $msg . "</p>";
       ?>
       
   </form>
    
</body>
</html>