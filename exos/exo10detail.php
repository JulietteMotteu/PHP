<?php
ob_start();

require_once("./config2.php");

try {
    $pdo = new PDO(MYSQL_DSN, DB_USER, DB_PWD);
} catch (PDOException $e) {
    echo $e->getMessage();
    $pdo = null;
    die();
}

function isPositiveInt ($number) {
    $int = (int) $number;
    return $int > 0 && is_numeric($int);
}

$requete = $pdo->query('SELECT id FROM t_langage');
if ($requete === false) {
    die("Problème technique");
}
else {
    $tab = $requete->fetchAll(PDO::FETCH_ASSOC);
    $tabId = [];
    for ($i = 0; $i<count($tab); $i++) {
        $tabId[$i] = $tab[$i]['id'];
    }
}

if (isset($_GET['id'])){
    if (isPositiveInt($_GET['id']) && in_array($_GET['id'], $tabId)){
    //Pour la liste d'année
  /*  $statement = $pdo->query('SELECT * FROM t_langage');

    if ($statement === false) {
        die("Problème technique");
    }
    else {
        $listeLangage = $statement->fetchAll(PDO::FETCH_ASSOC);
    }*/
    
    $statement2 = $pdo->prepare('SELECT * FROM t_langage
                                WHERE id = :monId');
    
    $statement2->bindValue(':monId', $_GET['id'], PDO::PARAM_INT);
    
    $statement2->execute();
    
    $reponse = $statement2->fetchAll(PDO::FETCH_ASSOC);
    }  
    else {
        header('location: ./exo10.php');
    }
}

var_dump($_POST);
if (isset($_POST['dateCreation'], $_POST['idGet'])) {
    
    if (isset($_POST['openSource'])) {
        $isOpenSource = true;
    }
    else {
        $isOpenSource = false;
    }
    
    $statement3 = $pdo->prepare('UPDATE t_langage
                                SET dateCreation = :dateCreation, isFloss = :openSource
                                WHERE id = :monId');
    
    $statement3->bindValue(':dateCreation', $_POST['dateCreation'], PDO::PARAM_INT);
    $statement3->bindValue(':openSource', $isOpenSource, PDO::PARAM_BOOL);
    $statement3->bindValue(':monId', $_POST['idGet'], PDO::PARAM_INT);
    
    $statement3->execute();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exo 10 détail</title>
</head>
<body>
    
    <h1>Détail langage</h1>
    
    <form action="" method="post">
        <input type="text" name="nomLangage" value="<?php echo $reponse[0]['name']; ?>">
        <select name="dateCreation" id="">
            <?php
 /*           for ($i=0; $i<count($listeLangage); $i++) {
                echo '<option value="' . $listeLangage[$i]['dateCreation'] . '"'; 
                if ($listeLangage[$i]['dateCreation'] == $reponse[0]['dateCreation']) {
                    echo 'selected';
                }
                echo '>' . $listeLangage[$i]['dateCreation'] . '</option>';   
            }*/
            for ($i=1975; $i<date("Y") + 2; $i++) {
                echo '<option value="' . $i . '"'; 
                if ($i == $reponse[0]['dateCreation']) {
                    echo 'selected';
                }
                echo '>' . $i . '</option>';   
            }
                
            ?>
        </select>
         
        <?php 
        echo '<input type="checkbox" value="' . $reponse[0]['isFloss'] . '" name="openSource"';
        if ($reponse[0]['isFloss']) {
            echo 'checked';
        }
        echo '>';
        
        echo '<input type="hidden" value="' . $reponse[0]['id'] . '" name="idGet">';
        ?>
        <button>Envoyer</button>
    </form>
    
</body>
</html>

<?php
ob_flush();
?>