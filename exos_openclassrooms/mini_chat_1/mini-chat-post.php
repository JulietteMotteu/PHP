<?php
if(isset($_POST['pseudo'])) {
    setcookie('pseudo', $_POST['pseudo'], time() + 365*24*3600, null, null, false, true);
}

try {
    $bdd = new PDO('mysql:host=localhost;dbname=oc', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e) {
    die ('Erreur : ' . $e->getMessage());
}

if(isset($_POST['pseudo'], $_POST['message'])) {
    $pseudo = $_POST['pseudo'];
    $message = $_POST['message'];
    $statement = $bdd->prepare('INSERT INTO mini_chat (pseudo, message) VALUES(:pseudo, :message)') or die(print_r($bdd->errorInfo()));
    $statement->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
    $statement->bindValue(':message', $message, PDO::PARAM_STR);
    $statement->execute();
}

header('Location: ./mini-chat.php');