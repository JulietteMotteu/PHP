<?php
/*5. Créez un script PHP qui affiche le jour de la semaine en lettres. Par exemple 'Nous sommes un mardi'.  
Tips : Array ou switch + function date()*/
$day = date("D");
var_dump($day);

$arrayJours = ["lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi", "dimanche"];

switch ($day) {
    case 'Mon':
        $jour = "lundi";
        break;
    case 'Tue':
        $jour = "mardi"; 
        break;
    case 'Wed':
        $jour = "mercredi"; 
        break;
    case 'Thu':
        $jour = "jeudi"; 
        break;
    case 'Fri':
        $jour = "vendredi"; 
        break;
    case 'Sat':
        $jour = "samedi";
        break;
    case 'Sun':
        $jour = "Dimanche"; 
        break;
}
echo 'Nous sommes un ' . $jour;
?>