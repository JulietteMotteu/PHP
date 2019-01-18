<?php
session_start();
if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
{
    echo 'Bonjour ' . $_SESSION['pseudo'];
}

try {
    $bdd = new PDO('mysql:host=localhost;dbname=espace_membres;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e) {
    die ('Erreur : ' . $e->getMessage());
}

// Regex Email
$regexEmail = "#^[a-z0-9.-_]+@[a-z0-9.-_]{2,}\.[a-z]{2,4}$#";

// Vérification de la validité des informations + insertion nouvel utilisateur dans la DB
if(isset($_POST['pseudo'], $_POST['password'], $_POST['passwordConfirm'], $_POST['email'])) {
    
    // Vérfication faille XSS
    $pseudo =  htmlspecialchars($_POST['pseudo']);
    $password = htmlspecialchars($_POST['password']);
    $passwordConfirm = htmlspecialchars($_POST['passwordConfirm']);
    $email = htmlspecialchars($_POST['email']);
    
    // On regarde si le pseudo est déjà utilisé
    $statement = $bdd->prepare('SELECT pseudo FROM membres WHERE UPPER(pseudo) = UPPER(:pseudo)');
    $statement->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
    $statement->execute();
    $pseudoVerify = $statement->fetchAll();
    
    $statement->closeCursor();
    
    // On vérifie si les infos sont conformes
    if(empty($pseudoVerify) && $password == $passwordConfirm && preg_match($regexEmail, $email)) {
        
        // Hachage du mot de passe
        $pass_hache = password_hash($password, PASSWORD_DEFAULT);
        
        // Si oui, on insère le nouveau membre dans la DB
        $statement = $bdd->prepare('INSERT INTO membres(pseudo, pass, email, date_inscription) VALUES(:pseudo, :pass, :email, CURDATE())');
        $statement->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
        $statement->bindValue(':pass', $pass_hache, PDO::PARAM_STR);
        $statement->bindValue(':email', $email, PDO::PARAM_STR);
        $statement->execute();
        $statement->closeCursor();
        
        echo 'Vous êtes maintenant inscrit!';
    }
    elseif (!empty($pseudoVerify)) {
        echo 'Ce pseudo est déjà utilisé';
    }
    elseif ($password != $passwordConfirm) {
        echo 'Les mots de passe ne sont pas identiques';
    }
    elseif (!preg_match($regexEmail, $email)) {
        echo 'L\'adresse mail n\'est pas valide';
    }
}
else {
    echo "Veuillez remplir tous les champs";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
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
            <label for="passwordConfirm">Confirmation</label>
           <input type="password" name="passwordConfirm">
       </div>
       <div>
           <label for="email">Email</label>
           <input type="text" name="email">
       </div>
       <button type="submit">Inscription</button>
   </form>
    
</body>
</html>