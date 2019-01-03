<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Mini Chat</title>
	<meta charset="utf-8"/>
	<style type="text/css">
		.sendBox{
			text-align: center;
		}
	</style>
</head>
<body>
	<?php
		try { 
			$db = new PDO('mysql:host=localhost;dbname=mini_chat', 'root', ''); 
		} 
		catch(Exception $e) {
    		die('Erreur : '.$e->getMessage()); 
		}
		$chat = $db->query('SELECT id, pseudo FROM chatBox ORDER BY addDate DESC');
		$result = $chat -> fetch();
		$_SESSION['pseudo'] = $result['pseudo'];
	?>
	<form method="POST" action="controller.php" class="sendBox">
		<p>
			<label for="pseudo">Pseudo :</label>
			<input type="text" name="pseudo" id="pseudo" value="<?php if ($_SESSION == false) {
			echo('');
			}else{
				echo $_SESSION['pseudo'];
			}
			 ?>">
		</p>
		<p>
			<label for="message">Message :</label>
			<input type="text" name="message" id="message">
		</p>
		<button>Envoyer</button>
	</form>
</body>
</html>