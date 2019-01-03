<?php
header ("Content-type: image/jpeg");

$imagefrom = imagecreatefromjpeg('images/avatar3.jpg');
imagejpeg($imagefrom);
imagedestroy($imagefrom);
?>