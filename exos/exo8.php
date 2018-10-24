
<?php
/*8. Créez une page web qui a deux feuilles de style CSS (jour.css et nuit.css) et qui en choisit l'une ou l'autre en fonction de l'heure. 
(uniquement au chargement de la page).*/
$heure = date('G');

if ($heure > 8 && $heure < 22) {
    $style = 'jour.css';
}
else {
    $style = 'nuit.css';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exo 8</title>
    
<?php
    echo '<link rel="stylesheet" href="./' . $style . '">'
?>
</head>
<body>
   
   <h1>Titre</h1>
   
   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed veritatis, ea officia rerum facere laboriosam sequi omnis, libero aspernatur voluptas odit, tempore necessitatibus. Consequuntur velit eligendi accusantium perferendis possimus quos.</p>
    
</body>
</html>

