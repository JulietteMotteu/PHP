<?php
$texte = 'https://openclassrooms.com/fr/dashboard';

/*$texte = "[color=olive]Je m'appelle Juliette[/color]";*/
$texte = preg_replace('#\[b\](.+)\[/b\]#isU', '<strong>$1</strong>', $texte);
$texte = preg_replace('#\[i\](.+)\[/i\]#isU', '<em>$1</em>', $texte);
$texte = preg_replace('#\[color=(red|green|blue|yellow|purple|olive)\](.+)\[/color\]#isU', '<span style="color:$1">$2</span>', $texte);
$texte = preg_replace("#^https://([a-z0-9._/-]+)#i", '<a href=$0>$1</a>', $texte);

echo $texte;

?>
