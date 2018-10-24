<?php

/*4. Créez 2 fonctions de validation de formulaire et gardez-les précieusement ; )
isPositiveTinyInt() qui renvoi un Booléen d'après que le paramètre est ou pas un chiffre entre 0 et 255 inclus. 
isTinyInt() qui renvoi un Booléen d'après que le paramètre est ou pas un chiffre entre -128 et 127 inclus.
Testez-les plusieurs fois avec des valeurs différentes et var_dump().

Challenge : La fonction isTinyInt() doit fonctionner que le paramètre soit une String, un Integer ou un Float.

Tips : casting via $var nombre = (int) $monParam; et is_numeric()*/

function isPositiveTinyInt($string) {
    $int = (int) $string;
    return $int >= 0 && $int <= 255 && is_numeric($int);
}

function isTinyInt($string) {
    $int = (int) $string;
    return $int >= -128 && $int <= 127 && is_numeric($int);
}

$nombre = "8.5";

echo $nombre . ' est-il un entier positif compris entre 0 et 255? ';
var_dump(isPositiveTinyInt($nombre));
echo '<hr>';

echo $nombre . ' est-il un entier compris entre -128 et 127? ';
var_dump(isTinyInt($nombre));
echo '<hr>';

?>