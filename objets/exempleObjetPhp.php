<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP objets</title>
</head>
<body>
    
    <?php
    
    echo "Voici quelques exemples d'objets en PHP";
    
    class Personnage {
        public $nom;
        public $force;
        public $mechant;
        
        function __construct ($nom, $force = 0, $mechant = true) {
            $this->nom = $nom;
            $this->force = $force;
            $this->mechant = $mechant;
        }
        function marcher() {
            echo "<br>" . $this->nom . " marche<br>";
        }
        function seBattre ($arme) {
            echo "<br>Le personnage se bat avec " . $arme . "<br>"; 
            echo "<br>Il a " . $this->force . " points de force";
            if ($this->mechant == true) {
                echo "<br>Il est bien méchant!";
            }
            else {
                echo "<br>Pas méchant";
            }
        }
     }
    
    $monPersonnage = new Personnage ("Conan", 20);
    $monPersonnage2 = new Personnage ("Spiderman", 50);
    $monPersonnage3 = new Personnage ("Thor", 80, false);
    
    var_dump($monPersonnage);
    var_dump($monPersonnage2);
    $monPersonnage->marcher();
    $monPersonnage->seBattre("une épée");
    $monPersonnage3 ->seBattre("un marteau");
    $monPersonnage3->marcher();
    echo $monPersonnage->nom;
    ?>
    
</body>
</html>