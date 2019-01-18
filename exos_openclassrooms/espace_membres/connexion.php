<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=espace_membres;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e) {
    die ('Erreur : ' . $e->getMessage());
}

if(isset($_POST['pseudo'], $_POST['password'])) {
    $statement = $bdd->prepare('SELECT id, pseudo, pass FROM membres WHERE UPPER(pseudo) = UPPER(:pseudo)');
    $statement->execute(array(
        'pseudo' => $_POST['pseudo']));
    
    $reponse = $statement->fetch();
    var_dump($reponse);
    
    // Vérification mot de passe inséré / DB
    $isPasswordCorrect = password_verify($_POST['password'], $reponse['pass']);
    
    if(!$reponse) {
        echo 'Mauvais mot de passe ou identifiant';
    }
    else {
        if ($isPasswordCorrect) {
            session_start();
            $_SESSION['pseudo'] = $reponse['pseudo'];
            $_SESSION['id'] = $reponse['id'];
            // Création des cookies
            echo 'Vous êtes connecté';
            if(isset($_POST['auto'])) {
                setcookie('pseudo', $reponse['pseudo'], time() + 10*60, null, null, false, true);
                setcookie('pass', $reponse['pass'], time() + 10*60, null, null, false, true);
            }
        }
        else {
            echo 'Mauvais mot de passe ou identifiant';
        }
    }
}

if(isset($_COOKIE['pseudo'], $_COOKIE['pass'])) {
    session_start();
    echo 'Bonjour ' . $_COOKIE['pseudo'];
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
  
    <nav>
        <li><a href="connexion.php">Connexion</a></li>
        <li><a href="inscription.php">Inscription</a></li>
    </nav>
   
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
       
    <a href="deconnexion.php">Déonnexion</a>
    <?php 
        if (!isset($_SESSION['pseudo'])) {
            echo 'Déconnecté';
        }
        
    ?>
    </form>
    
</body>
</html>