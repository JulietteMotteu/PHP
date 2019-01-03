
<?php session_start(); ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mini-chat</title>
    </head>
    <style>
    form
    {
        text-align:center;
    }
    </style>
    <body>
        
    <form action="minichat_post.php" method="post">
        <p>

        <label for="pseudo">Pseudo</label> : <input type="text" name="pseudo" id="pseudo" value="<?php echo $_SESSION['session_pseudo']; ?>" /><br />
        <label for="message">Message</label> :  <input type="text" name="message" id="message" /><br />
        <input type="submit" value="Envoyer" />
        <input type="button" onclick="header('Location: minichat.php');" value="Rafraichir">
    </p>
    </form>

<?php
// Connexion à la base de données
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=oc;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// Récupération des 10 derniers messages
$reponse = $bdd->query('SELECT nom, message, DATE_FORMAT(date, \'le %d/%m/%Y à %Hh %imin %ss\') AS date_fr FROM mini_chat ORDER BY ID DESC LIMIT 0, 10');

// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
// Affichage de la date en "italique"
while ($donnees = $reponse->fetch())
{
    echo '<p><strong>' . htmlspecialchars($donnees['nom']) . '</strong> : ' . htmlspecialchars($donnees['message']) . '<br /><font size="2" color="blue">' . htmlspecialchars($donnees['date_fr']).'</p></font>'; 
}

$reponse->closeCursor();

?>
    </body>
</html>