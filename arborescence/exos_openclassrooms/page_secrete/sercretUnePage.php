<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Secret en une page</title>
</head>
<body>
    
    <?php
        if(!isset($_POST["motDePasse"]) || htmlspecialchars($_POST["motDePasse"]) !== 'kangourou') { ?>

            <form action="" method="post">
                <label for="motDePasse">Mot de passe</label>
                <input type="password" name="motDePasse">
                <button type="submit">Envoyer</button>
            </form>
            
    <?php
            if(isset($_POST["motDePasse"]) && htmlspecialchars($_POST["motDePasse"]) !== 'kangourou') {
                echo "<p>Mot de passe incorrect</p>";
            }
        }
        else { ?>
    
            <h1>Voici les codes d'accès :</h1>

                <p><strong>CRD5-GTFT-CK65-JOPM-V29N-24G1-HH28-LLFV</strong></p>   

                <p>

                Cette page est réservée au personnel de la NASA. N'oubliez pas de la visiter régulièrement car les codes d'accès sont changés toutes les semaines.<br />

                La NASA vous remercie de votre visite.

                </p>
    
    <?php  
        }
        
        
    ?>
   
   
    
</body>
</html>