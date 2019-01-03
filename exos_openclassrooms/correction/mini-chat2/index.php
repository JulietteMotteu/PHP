<!Doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Mini-chat</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
	<body>
		<div class="global">
		<?php include("bdconnexion.php");?>
		<div class="formulaire">
			<h2>MINI-CHAT</h2>
			<form action="traitement.php" method="post">
				<label for="nom">Nom</label><br>
			<input type="text" name="pseudo" id="nom" value="<?php if(isset($_GET["nom"])){echo $_GET["nom"];}else{echo"";}?>" required=""><br>
			<label for="message">Message</label><br>
			<input type="text" name="message" id="message" required=""><br><br>
<input type="submit" value="Envoyer">
			<br><br>
		</form>
		</div>
		<div class="message">
			<div>Liste des messages</div>
			<?php
			

$requete=$base->query('SELECT pseudo,contenue,	DATE_FORMAT(moment,\'Le %d/%m/%Y, %H:%i\') AS moment FROM message');


	while ($resultats=$requete->fetch()) {
		if(!$resultats)
{	echo"";
break;
}
else
{
		echo'<h5>Par '.$resultats["pseudo"].'</h5>
		<div class="contenue">
		<p>'.$resultats["moment"].'</p>
<p>'.$resultats["contenue"].'</p>
		</div><br>';
	}
}
?>
		</div>
	</div>
	</body>
</html>