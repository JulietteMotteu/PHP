<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=test', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e) {
    die ('Erreur : ' . $e->getMessage());
}

if(isset($_GET['id']) && is_int((int)($_GET['id']))) {
    // Récupérer le billet
    $statement = $bdd->prepare('SELECT *, DATE_FORMAT(date_creation, "%d/%m/%y à %Hh%imin%ss") AS date_billet FROM billets WHERE id = :id');
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
    
    <h1>Mon super Blog</h1>
    <a href="./index.php">Retour à la liste des billets</a>
    <h3><?php echo htmlspecialchars($billet['titre']); ?><em> le <?php echo $billet['date_billet']; ?></em></h3>
    <p><?php echo htmlspecialchars($billet['contenu']); ?></p> 
   
    <h2>Commentaires</h2>
    
    
    <?php
    
    foreach($data as $comment){ ?>
        <p><strong><?php echo htmlspecialchars($comment->auteur); ?></strong> le <?php echo $comment->date; ?></p>
        <p><?php echo htmlspecialchars($comment->commentaire); ?></p>
    <?php
    }
    
    $statement->closeCursor();
    ?>
    
    <form action="commentaires-post.php" method="post">
        <label for="auteur">Pseudo</label>
        <input type="text" name="auteur">
        <label for="message">Message</label>
        <input type="text" name="message">
        <button type="submit">Poster</button>
    </form>

    
</body>
</html>