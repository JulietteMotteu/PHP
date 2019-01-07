<?php

$source = imagecreatefromjpeg('images/avatar3.jpg');
$destination = imagecreatetruecolor(300, 150);

// Les fonctions imagesx et imagesy renvoient la largeur et la hauteur d'une image
$largeur_source = imagesx($source);
$hauteur_source = imagesy($source);
$largeur_destination = imagesx($destination);
$hauteur_destination = imagesy($destination);

// On crée la miniature
imagecopyresampled($destination, $source, 0, 0, 0, 0, $largeur_destination, $hauteur_destination, $largeur_source, $hauteur_source);

// On enregistre la miniature sous le nom "mini_couchersoleil.jpg"
imagejpeg($destination, "images/mini_avatar.jpg");
?>
<img src="images/mini_avatar.jpg" alt="Avatar" />