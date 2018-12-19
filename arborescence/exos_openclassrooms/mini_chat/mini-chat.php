<?php 

try {
    $bdd = new PDO('mysql:host=localhost;dbname=test', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e) {
    die ('Erreur : ' . $e->getMessage());
}

$statement2 = $bdd->query('SELECT * FROM mini_chat ORDER BY ID DESC LIMIT 0, 10');
$reponse = $statement2->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mini-chat</title>
    <style>
        input, label {
            margin: 10px;
        }
    
    </style>
</head>
<body>
    
    <form action="./mini-chat-post.php" method="post">
       
        <label for="pseudo">Pseudo</label>
        <input type="text" name="pseudo" value="<?php echo $_COOKIE['pseudo']; ?>"><br>
        <label for="message">Message</label>
        <input type="text" name="message">
        <button type="submit">Envoyer</button>
        <a href="./mini-chat.php">Rafraîchir</a>
        
    </form>
    
    <?php
    
    foreach($reponse as $rep){
        echo '<div><h4>Auteur: ' . htmlspecialchars($rep['pseudo']) . '</h4><p>Message: ' . htmlspecialchars($rep['message']) . '</p></div>';
    }
    
    $statement2->closeCursor();
    
    ?>
    
</body>
</html>