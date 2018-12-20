<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=oc', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e) {
    die ('Erreur : ' . $e->getMessage());
}

if(isset($_GET['id']) && is_int((int)($_GET['id']))) {
    // Récupérer le nombre de commentaires
    $statement = $bdd->prepare('SELECT COUNT(*) as nb_comment FROM commentaires WHERE id_billet = :id');
    $statement->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
    $statement->execute();
    $nb_billet_string = $statement->fetch();
    $nb_billet = (int)$nb_billet_string['nb_comment'] ;
    $statement->closeCursor();
    
    // Récupérer le billet
    $statement = $bdd->prepare('SELECT *, DATE_FORMAT(date_creation, "%d/%m/%y à %Hh%imin%ss") AS date_billet FROM billets WHERE id = :id LIMIT ');
    $statement->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
    $statement->execute();
    $billet = $statement->fetch();
    $statement->closeCursor();
        
    // Récupérer les commentaires du billet
    $statement = $bdd->prepare('SELECT *, DATE_FORMAT(date_commentaire, "%d/%m/%y à %Hh%imin%ss") as date FROM commentaires WHERE id_billet = :id ORDER BY date_commentaire ASC');
    $statement->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
    $statement->execute();
    $data = $statement->fetchAll(PDO::FETCH_CLASS);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Commentaires</title>
</head>
<body>
    
    <?php
    if(empty($billet)) { ?>
       
        <p>Ce billet n'existe pas</p>
        
    <?php
    }
    else { ?>
    
    <h1>Mon super Blog</h1>
    <a href="./index.php">Retour à la liste des billets</a>
    <h3><?php echo htmlspecialchars($billet['titre']); ?><em> le <?php echo $billet['date_billet']; ?></em></h3>
    <p><?php echo htmlspecialchars($billet['contenu']); ?></p> 
   
    <h2>Commentaires</h2>
    
    <?php 
    }
    
    foreach($data as $comment){ ?>
        <p><strong><?php echo htmlspecialchars($comment->auteur); ?></strong> le <?php echo $comment->date; ?></p>
        <p><?php echo htmlspecialchars($comment->commentaire); ?></p>
    <?php
    }
    
    $statement->closeCursor();
    ?>
    
    <form action="commentaires-post.php?id=<?php echo $_GET['id']; ?>" method="post">
        <label for="auteur">Pseudo</label>
        <input type="text" name="auteur">
        <label for="message">Message</label>
        <input type="text" name="message">
        <button type="submit">Poster</button>
    </form>
    
    <?php 
    $page = 1;
    for($i = 1; $i<=$nb_billet; $i++) {
        if($i % 3 == 0) { 
            echo '<a href="./commentaires.php?id=' . $_GET['id'] . '&amp;page=' . $page . '">' . $page . '</a>';
            $page++;
        }
    }
    ?>
    
</body>
</html>