<?php

try {
    $bdd = new PDO('mysql:host=localhost;dbname=oc;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e) {
    die ('Erreur : ' . $e->getMessage());
}

$statement = $bdd->prepare('SELECT *, DATE_FORMAT(date, "%d/%m/%Y %H:%i:%s") as date FROM mini_chat ORDER BY date DESC');
$statement->execute();
$messages = $statement->fetchAll();

$statement->closeCursor();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mini chat</title>
    <style>
    
        form {
            margin-top: 50px;
            width: 300px;
            margin-left: auto;
            margin-right: auto;
        }
        
        form > div, button {
            margin: 10px;
        }
    
        #messages {
            width: 90%;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>
<body>
    
    <form action="mini_chat_post.php" method="post">
        <div>
            <label for="pseudo">Pseudo</label>
            <input type="text" name="pseudo" value="<?php echo $_COOKIE['pseudo'] ?>">
        </div>
        <div>
            <label for="message">Message</label>
            <input type="text" name="message">
        </div>
        <button type="submit">Poster</button>
    </form>
    
    <div id="messages">
       <?php
        
        foreach ($messages as $message) {
        ?>
        
        <div>
            <p>
            <?php echo '<em>' . htmlspecialchars($message['date']) . '</em> - <strong> ' . htmlspecialchars($message['pseudo']) . ' </strong> : ' . htmlspecialchars($message['message'])?>
            </p>
        </div>
        
        <?php
        }
        ?>
    </div>
    
</body>
</html>