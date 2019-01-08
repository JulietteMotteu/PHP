<?php

$regexTel = "#^0[0-68][-. ]?([0-9]{2}[-. ]?){4}$#";

if (isset($_POST['telephone']))
{
    $_POST['telephone'] = htmlspecialchars($_POST['telephone']); // On rend inoffensives les balises HTML que le visiteur a pu entrer
    if (preg_match($regexTel, $_POST['telephone']))
    {
        echo 'Le ' . $_POST['telephone'] . ' est un numéro <strong>valide</strong> !';
    }
    
    else
    {
        echo 'Le ' . $_POST['telephone'] . ' n\'est pas valide, recommencez !';
    }
}

?>

</p>

<form method="post">
	<p>
	    <label for="telephone">Votre téléphone ?</label> <input id="telephone" name="telephone" /><br />
	    <input type="submit" value="Vérifier le numéro" />
	</p>
</form>