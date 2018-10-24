   <?php
require_once('./config.php');
/*include('form.php');*/

try {
    $pdo = new PDO(MYSQL_DSN, DB_USER, DB_PWD);
} catch (PDOException $e) {
    echo $e->getMessage();  
    $pdo = null;            
    die();                  
}

$statement = $pdo->query('SELECT id, nom FROM mes_series');

if ($statement === false) {
    die("Problème technique");
}
else {
    $listeSeriesNetflix = $statement->fetchAll(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Liste séries</title>
</head>
<body>
   
   <h1>Liste des séries</h1>
   
   <ul>
      
       <?php

        for ($i = 0; $i < count($listeSeriesNetflix); $i++) {
            echo '<li><a href="detail_serie.php?monId=' . $listeSeriesNetflix[$i]['id'] . '">' . $listeSeriesNetflix[$i]['nom'] . '</li>';
        }

        ?>
       
   </ul>
   
    
</body>
</html>