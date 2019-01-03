<?php 

$pseudo = $_POST['pseudo'];
$message = $_POST['message'];

function addMessage(){
	try { 
	$db = new PDO('mysql:host=localhost;dbname=mini_chat', 'root', ''); 
	} 
	catch(Exception $e) {
    	die('Erreur : '.$e->getMessage()); 
	}

	$req = $db->prepare('INSERT INTO chatBox(pseudo,message,addDate) VALUES (?,?, now())');
	$req -> execute(array(
   		htmlspecialchars($_POST['pseudo']),htmlspecialchars($_POST['message'])));		
}
function getChat(){
	try { 
	$db = new PDO('mysql:host=localhost;dbname=mini_chat', 'root', ''); 
	} 
	catch(Exception $e) {
    	die('Erreur : '.$e->getMessage()); 
	}

	$chat = $db->query('SELECT id, pseudo, message, DATE_FORMAT(addDate, \'%d/%m/%Y à %Hh%imin%ss\') AS add_date_fr FROM chatBox ORDER BY addDate DESC');

	return $chat;
}

require 'indexView.php';

