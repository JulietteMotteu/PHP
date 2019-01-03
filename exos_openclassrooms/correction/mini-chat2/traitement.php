
<?php
include("bdconnexion.php");
			if(isset($_POST["pseudo"]) AND isset($_POST["message"]))
			{
				$nom=htmlspecialchars($_POST["pseudo"]);
				$message=htmlspecialchars($_POST["message"]);
				$ajout=$base->prepare('INSERT INTO message(pseudo,contenue,moment) VALUES(:pseudo,:contenue,NOW())');
				$ajout->execute(array(
"pseudo"=>$nom,
"contenue"=>$message
				));
				header('location:index.php?GET&nom='.$nom.'');
			}
			else
			{
				echo"champs manquant!!";
			}
?>