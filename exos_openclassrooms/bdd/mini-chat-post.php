<?php
header('Location: mini-chat.php');
try {
    $bdd = new PDO('mysql:host=localhost;dbname=test', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e) {
    die ('Erreur : ' . $e->getMessage());
}

if(isset($_POST['pseudo'], $_POST['message'])) {
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $message = htmlspecialchars($_POST['message']);
    $statement = $bdd->prepare('INSERT INTO mini_chat (pseudo, message) VALUES(:pseudo, :message)') or die(print_r($bdd->errorInfo()));
    $statement->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
    $statement->bindValue(':message', $message, PDO::PARAM_STR);
    $statement->execute();
}