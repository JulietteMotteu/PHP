<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=test', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e) {
    die ('Erreur: ' . $e->getMessage());
}

$statement = $bdd->query('SELECT *, DATE_FORMAT(date_creation, "%d/%m/%y à %Hh%imin%ss") AS date_billet FROM billets ORDER BY date_creation DESC');
$data = $statement->fetchAll(PDO::FETCH_CLASS);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mon super blog</title>
</head>
<body>
    <h1>Mon super Blog</h1>
    <?php
    
    foreach($data as $billet){
        ?>
        <h3><?php echo htmlspecialchars($billet->titre); ?><em> le <?php echo $billet->date_billet; ?></em></h3>
        <p><?php echo htmlspecialchars($billet->contenu); ?></p> 
        <a href="./commentaires.php?id=<?php echo $billet->id; ?>">Commentaires</a>
    
    <?php
    }
    $statement->closeCursor();
    ?>
    
</body>
</html>