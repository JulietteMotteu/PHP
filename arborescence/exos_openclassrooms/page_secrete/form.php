<?php
$motDePasseSecret = 'kangourou';
if(isset($_POST['motDePasse'])) {
    if (htmlspecialchars($_POST['motDePasse']) == $motDePasseSecret) {
        header('Location: codes.php');
    }
    else {
        $msg = 'Vous n\'avez pas entré le bon code!';
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exo code secret</title>
</head>
<body>
   
    <form action="" method="post">
        <label for="motDePasse">Mot de passe</label>
        <input type="password" name="motDePasse">
        <button type="submit">Envoyer</button>
    </form>
    
    <p><?php echo $msg; ?></p>
    
</body>
</html>