<?php 
require_once('./config.php');

try {
    $pdo = new PDO(MYSQL_DSN, DB_USER, DB_PWD);
}
catch (PDOException $e) {
    echo $e->getMessage();
    $pdo = null;
    die();
}

$msg= '';

$statement = $pdo->query('SELECT genre 
                          FROM personne
                          GROUP BY genre
                          ORDER BY genre ASC');

if ($statement === false) {
    die("Problème technique");
}
else {
    $listePrenom = $statement->fetchAll(PDO::FETCH_ASSOC);
}
    
if (isset($_POST['prenomSelect']) || isset($_POST['genreSelect'])) {
    $statement2 = $pdo->prepare('SELECT LEFT(prenom, 1) as firstLetter, genre 
                                 FROM personne 
                                 WHERE firstLetter = :monPrenom
                                 AND genre = :monGenre');
    
    $statement2->bindValue(':monPrenom', $_POST['prenomSelect'], PDO::PARAM_STR);
    $statement2->bindValue(':monGenre', $_POST['genreSelect'], PDO::PARAM_STR);
    
    $statement2->execute();
    
    $reponse = $statement2->fetchAll(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Prenoms</title>
</head>
<body>
   <form action="" method="post">
       <select name="genreSelect">
          
           <?php
           for ($i = 0; $i < count($listePrenom); $i++) {
               echo '<option value="' . $listePrenom[$i]['id'] . '">' . $listePrenom[$i]['genre'] . '</option>';
           }
           
           ?>
           
       </select>
       <input type="text" name="prenomSelect" maxlength="1">
       <input type="submit">
       
       <?php
        echo $msg;

       ?>
   </form>
    
</body>
</html>