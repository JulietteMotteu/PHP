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

$statement = $pdo->query('SELECT * FROM series_netflix ORDER BY nom');
$listeSeriesNetflix = $statement->fetchAll(PDO::FETCH_ASSOC);

   ?>
   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Séries Netflix</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Ubuntu');
        * {
            box-sizing: border-box;
        }
        
        h1, h2, p {
            font-family: 'Ubuntu';
        }
        h1 {
            text-align: center;
        }
        
        h2 {
            color: #b54d00
        }
        .parentDiv {
            width: 100%;
            margin-left: auto;
            margin-right: auto;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
    
        .parentDiv > div {
            border: 2px solid #b44f4f;
            border-radius: 5px;
            width: 70%;
            padding: 20px;
            margin: 20px;
            background-color: #ffe0af;
            display: flex;
            justify-content: center;
        }
        
        .parentDiv > div > div {
            width: 40%;
        }
        img {
            width: 50%;
        }
        
    </style>
</head>
<body>
  <img src="" alt="">
   <h1>Liste des séries Netflix</h1>
   
   <div class="parentDiv">
   
        <?php 
            for ($i = 0; $i < count($listeSeriesNetflix); $i++) {
                echo "<div><div><h2>" . $listeSeriesNetflix[$i]['nom'] . "</h2>";
                echo "<img src='./img/" . $listeSeriesNetflix[$i]['id'] . ".jpg'></div>";
                echo "<div><p>Date de sortie: " . $listeSeriesNetflix[$i]['date_sortie'] . "</p>";
                echo "<p>Nombre de saisons: " . $listeSeriesNetflix[$i]['nb_saison'] . "</p>";
                echo "<p>nombre d'épisodes: " . $listeSeriesNetflix[$i]['nb_episode'] . "</p></div></div>";
            }

        ?>
  
   </div>
    
</body>
</html>