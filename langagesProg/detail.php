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

function isPositiveInteger($str) {
    $entier = (int) $str;
    return $str > 0 && $entier == $str;
}

$msg = '';

if (isset($_GET['monId']) && isPositiveInteger($_GET['monId'])) {
    $statement = $pdo->prepare('SELECT * FROM t_langage 
                               WHERE id = :monId');
    
    $statement->bindValue(':monId', $_GET['monId'], PDO::PARAM_INT);
    $statement->execute();
    
    $detailLang = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    if (count($detailLang)) {
        $msg = 'Le langage ' . $detailLang[0]['name'] . ' a été créé en ' . $detailLang[0]['dateCreation'] . '.';
    }
    
    else {
        $msg = 'Rien trouvé... T__T';
    }
    
    
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Détail</title>
</head>
<body>
  
   <h1>Détail de l'id choisi</h1>
   
   <p>Si je pointe vers detail.php?id=42&amp;id2=david, je peux récupérer ces deux variables avec $_GET ($_GET['id'], $_GET['id2']). Attention, les variables seront toujours des STRING!</p>
   
    <?php
    
        echo "<p> $msg </p>";

    ?>
    
</body>
</html>