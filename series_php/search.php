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

$msg = '';

if (isset($_POST['search']) && $_POST['search'] != '') {
    $statement = $pdo->prepare('SELECT id, nom FROM series_netflix
                                WHERE LOWER(nom) LIKE LOWER(:nom_serie)');
    
    $statement->bindValue(':nom_serie', '%' . $_POST['search'] . '%', PDO::PARAM_STR);
    
    $statement->execute();
    
    $reponse = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    if ($pdo->errorCode() == 00000) {
        if (count($reponse) > 0){
            $msg = '<ul>'; 
            for ($i = 0; $i < count($reponse); $i++) {
                $msg .= '<li>' . $reponse[$i]['nom'] . '</li>';
            }
            $msg .= '</ul>';
        }
        else {
            $msg = 'Désolé, je n\'ai rien trouvé :-(';
        }
    }
    else {
        $msg = 'Désolé, je n\'ai rien trouvé :-(';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search</title>
</head>
<body>
   
   <form action="" method="post">
       <input type="text" name="search">
       
       <button>Recherche</button>
       
       <?php 
       echo $msg;
       ?>
   </form>
    
</body>
</html>