<?php

$note = 10;


switch ($note) // on indique sur quelle variable on travaille

{ 

    case 0: // dans le cas où $note vaut 0

        echo "Tu es vraiment un gros nul !!!";



    

    case 5: // dans le cas où $note vaut 5

        echo "Tu es très mauvais";



    

    case 7: // dans le cas où $note vaut 7

        echo "Tu es mauvais";

    

    case 10: // etc. etc.

        echo "Tu as pile poil la moyenne, c'est un peu juste…";



    

    case 12:

        echo "Tu es assez bon";

   

    

    case 16:

        echo "Tu te débrouilles très bien !";



    

    case 20:

        echo "Excellent travail, c'est parfait !";



    

    default:

        echo "Désolé, je n'ai pas de message à afficher pour cette note";

}

?>