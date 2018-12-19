<?php

$monFicher = fopen("compteur.txt", "r+");
$vues = fgets($monFicher);
$vues += 1;
fseek($monFicher, 0);
fwrite($monFicher, $vues);
fclose($monFicher);