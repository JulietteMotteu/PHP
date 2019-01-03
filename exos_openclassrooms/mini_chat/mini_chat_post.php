<?php
if(isset($_POST['pseudo'])) {
    setcookie('pseudo', $_POST['pseudo'],  time() + 10*60, null, null, false, true);
}
try {
    $bdd = new PDO('mysql:host=localhost;dbname=oc;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e) {
    die ('Erreur : ' . $e->getMessage());
}

if(isset($_POST['pseudo'], $_POST['message'])) {
    $statement = $bdd->prepare('INSERT INTO mini_chat (pseudo, message, date) VALUES (:pseudo, :message, NOW())');
    $statement->bindValue(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
    $statement->bindValue(':message', $_POST['message'], PDO::PARAM_STR);
    $statement->execute();
    
    $statement->closeCursor();
}

header('Location: mini_chat.php');