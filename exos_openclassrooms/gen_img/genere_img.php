<?php

header ("Content-type: image/png");

$image = imagecreate(200,200);
$orange = imagecolorallocate($image, 255, 128, 0);
$bleu = imagecolorallocate($image, 0, 0, 255);
$noir = imagecolorallocate($image, 0, 0, 0);
$bleuclair = imagecolorallocate($image, 156, 227, 254);
$blanc = imagecolorallocate($image, 255, 255, 255);

imagestring($image, 4, 35, 15, utf8_decode("Salut les Zéros !"), $blanc);
ImageLine ($image, 30, 30, 120, 120, $blanc);
ImageEllipse ($image, 100, 100, 100, 50, $noir);
ImageRectangle ($image, 30, 30, 160, 120, $noir);
$points = array(10, 40, 120, 50, 160, 160); 
ImagePolygon ($image, $points, 3, $noir);
imagecolortransparent($image, $orange);

imagepng($image);
imagedestroy($image);

?>