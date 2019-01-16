<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=espace_membres;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e) {
    die ('Erreur : ' . $e->getMessage());
}

if(isset($_POST['pseudo'], $_POST['password'])) {
    $statement = $bdd->prepare('SELECT id, pass FROM membres WHERE pseudo = :pseudo');
    $statement->execute(array(
        'pseudo' => $_POST['pseudo']));
    
    $reponse = $statement->fetchAll();
    var_dump($reponse['pass']);
    // Vérification mot de passe inséré / DB
    $isPasswordCorrect = password_verify($_POST['password'], $reponse['pass']);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <style>
    
        form {
            margin-top: 100px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        
        div {
            margin: 10px;
        }
        
        label {
            width: 100px;
            display: inline-block;
        }
        
        input {
            width: 200px;
        }
        
    </style>
</head>
<body>
   
    <form action="" method="post">
       
    <div>
        <label for="pseudo">Pseudo</label>
        <input type="text" name="pseudo">
    </div>
    <div>
        <label for="password">Mot de passe</label>
        <input type="password" name="password">
    </div>
    <div>
        <label for="auto">Connexion automatique</label>
        <input type="checkbox" name="auto">
    </div>
      
    <button type="submit">Connexion</button>
       
    </form>
    
</body>
</html>