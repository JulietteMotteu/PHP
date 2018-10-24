<?php 
require_once('./config.php');

// On essaye de se connecter à la DB...
try {
    // avec le bon login - mdp
    $pdo = new PDO(MYSQL_DSN, DB_USER, DB_PWD);
} catch (PDOException $e) {
    echo $e->getMessage();  // On affiche le message d'erreur
    $pdo = null;            // On détruit le pdo par sécurité
    die();                  // On arrête le script car rien ne marche
}

/*$statement2 = $pdo->exec('INSERT INTO t_langage
                        (name, dateCreation, lastVersion, isFloss) 
                        VALUES 
                        ("Ada", 1980 , "ADA2012TC1", 1)');

var_dump($statement2);*/

$statement = $pdo->query('SELECT * FROM t_langage');        // Select dans la BD
$listeLangageProg = $statement->fetchAll(PDO::FETCH_ASSOC); // Renvoie sous forme d'array associatif

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mon site dynamique PHP</title>
    <style>
        h1, h2, p {
            font-family: 'Arial';
        }
        div {
            border : 5px solid #8146ac;
            margin: 5px;
            border-radius: 5px;
            padding-left: 50px;
            background-color: #8e84d9;
            
        }
    
    </style>
</head>
<body>
    <h1>PHP &amp; Maria DB</h1>
        <h2>La liste des langages de programmation</h2>
        
        <?php 

            for ($i = 0; $i < count($listeLangageProg); $i++) {
                echo '<div><h2>'. $listeLangageProg[$i]['name'] . '</h2><p>'. $listeLangageProg[$i]['name'] . ' a été créé en ' . $listeLangageProg[$i]['dateCreation'] . '. ';
                if ($listeLangageProg[$i]['isFloss'] == 0) {
                    echo 'Ce n\'est pas un langage Open Source.</p></div>';
                }
                else {
                    echo 'C\'est un langage Open Source.</p></div>';
                }
            }

        ?>   
        
        <p>Choisissez votre langage favori</p>
        <form action="inexistant.php" method="post">
            <select name="langage">
                
                <?php   
                    
                    for ($i = 0; $i < count($listeLangageProg); $i++) {
                        echo '<option value="' . $listeLangageProg[$i]['id'] . '">' . $listeLangageProg[$i]['name'] . '</option>' ;
                    }
                ?>
            </select>
        </form>
    
  
    
</body>
</html>