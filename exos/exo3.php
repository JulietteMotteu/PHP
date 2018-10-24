<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exo 3</title>
</head>
<body>
<!--  3. Faîtes une boucle qui affiche tous les chiffres de 50 à 42.

Mini Challenge : le tout dans une liste à puces

Challenge : et affichez à chaque fois s'ils sont pairs ou impairs. (<li>50 est pair</li>, <li>49 est impair</li>, ...)-->
  
   <h1>Boucle</h1>
   
   <ul>
       <?php

        for ($i = 50; $i >= 42; $i--) {
            if ($i % 2 == 0) {
                echo '<li>' . $i . ' est pair</li>';
            }
            else {
                echo '<li>' . $i . ' est impair</li>';
            }
        }

        ?>
       
   </ul>
    
       
</body>
</html>