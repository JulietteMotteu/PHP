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

$statement = $pdo->query('SELECT id, name FROM t_langage ORDER BY name ASC');

if ($statement === false) {
    die("Problème technique");
}

else {
    $listeLangagesProg = $statement->fetchAll(PDO::FETCH_ASSOC);
}


/*$listeLangagesProg = $pdo->query('SELECT id, name FROM t_langage ORDER BY name ASC')->fetchAll(PDO::FETCH_ASSOC);*/



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Langages Prog</title>
</head>
<body>
  
  <h1>Mes articles sur les langages de programmtion</h1>
  
  <ul>
    
    <?php
      
      for ($i = 0; $i < count($listeLangagesProg); $i++) {
          echo '<li>
                <a href="detail.php?monId=' . $listeLangagesProg[$i]['id'] . '">' . $listeLangagesProg[$i]['name'] . '
                </li>';
      }
    
    ?>
      
  </ul>
    
</body>
</html>