<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=espace_membres;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e) {
    die ('Erreur : ' . $e->getMessage());
}

// Regex Email
$regexEmail = "#^[a-z0-9.-_]+@[a-z0-9.-_]{2,}\.[a-z]{2,4}$#";

// Vérification de la validité des informations
if(isset($_POST['pseudo'], $_POST['password'], $_POST['passwordConfirm'], $_POST['email'])) {
    $statement = $bdd->prepare('SELECT pseudo FROM membres WHERE UPPER(pseudo) = UPPER(:pseudo)');
    $statement->bindValue(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
    $statement->execute();
    $pseudoVerify = $statement->fetchAll();
    
    $statement->closeCursor();
    
    if(empty($pseudoVerify && $_POST['password'] == $_POST['passwordConfirm']) && preg_match($regexEmail, $_POST['mail'])) {
        $statement = $bdd->prepare('INSERT INTO membres(pseudo, pass, email, date_inscription) VALUES(:pseudo, :pass, :email, CURDATE())');
        $statement->bindValue(':pseudo', htmlspecialchars($_POST['pseudo']), PDO::PARAM_STR);
        $statement->bindValue(':pass', htmlspecialchars($_POST['password']), PDO::PARAM_STR);
        $statement->bindValue(':email', htmlspecialchars($_POST['email']), PDO::PARAM_STR);
    }
}

// Hachage du mot de passe
/*$pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);


// Insertion
$req = $bdd->prepare('INSERT INTO membres(pseudo, pass, email, date_inscription) VALUES(:pseudo, :pass, :email, CURDATE())');
$req->execute(array(
    'pseudo' => $pseudo,
    'pass' => $pass_hache,
    'email' => $email));*/
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
           <input type="text" name="passwordConfirm">
       </div>
       <div>
           <label for="email">Email</label>
           <input type="text" name="email">
       </div>
       <button type="submit">Inscription</button>
   </form>
    
</body>
</html>