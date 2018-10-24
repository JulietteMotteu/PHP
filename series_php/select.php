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

$statement2 = $pdo->query('SELECT id, nom FROM series_netflix ORDER BY nom');

if ($statement2 === false) {
    die("Problème technique");
}
else {
    $listeSeriesNetflix = $statement2->fetchAll(PDO::FETCH_ASSOC);
}

if (isset($_POST['nom_serie'])) {
    $statement = $pdo->prepare('SELECT id, nom, date_sortie 
                                FROM series_netflix 
                                WHERE id = :id_serie');
    $statement->bindValue(':id_serie', $_POST['nom_serie'], PDO::PARAM_INT);
    
    $statement->execute();
    
    $reponse = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    var_dump($reponse);
  
    if (count($reponse) > 0) {
        $msg = 'La série ' . $reponse[0]['nom'] . " a été créée en " . $reponse[0]['date_sortie'];
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
       <select name="nom_serie">
          <?php
           
           for ($i = 0; $i < count($listeSeriesNetflix); $i++) {
               echo "<option value='" . $listeSeriesNetflix[$i]['id'] . "'>" . $listeSeriesNetflix[$i]['nom'] . "</option>";
           }
          ?>
       </select>
       <input type="submit">
       
       <?php 
            echo "<p>" . $msg . "</p>";
       ?>
       
   </form>
    
</body>
</html>