<?php
/*   6. Créez un formulaire avec un input dans lequel on peut encoder un prix et un menu déroulant qui offre le choix entre 3 taux de TVA et créez le script PHP qui calcul le montant avec TVA.*/
$msg = '';

$tauxTVA = [6, 12, 21];

if(isset($_POST['prix']) && isset($_POST['tauxTVA'])) {
    $prixTVAC = $_POST['prix'] + $_POST['prix'] * $_POST['tauxTVA']/100; 
    $msg = 'Le prix TVA compris est de ' . $prixTVAC;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exo 6</title>
</head>
<body>
   <form action="" method="post">
       <label for="prix">Entrez un prix</label>
       <input type="number" name="prix" step="0.01">
       <select name="tauxTVA" id="">
           <option value="6">6 %</option>
           <option value="12">12 %</option>
           <option value="21">21 %</option>
       </select>
       <button type="submit">Calculer</button>
       <p>
           <?php
                echo $msg;
           ?>
       </p>
       
   </form>
    
</body>
</html>