<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=espace_membres;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e) {
    die ('Erreur : ' . $e->getMessage());
}

// Vérification de la validité des informations
if(isset($_POST['password'])) {
    $statement = $bdd->prepare('SELECT pseudo FROM membres WHERE pass = :password');
    $statement->bindValue(':password', $_POST['password'], PDO::PARAM_STR);
    $statement->execute();
    if()
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
       
   </form>
    
</body>
</html>