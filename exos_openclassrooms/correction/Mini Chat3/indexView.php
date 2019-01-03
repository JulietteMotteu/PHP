<?php

if ($pseudo == '') {
	require 'index.php';
	$chat = getChat();
	while ($result = $chat -> fetch()) {
	echo('<p><strong>' .$result['pseudo']. ' : </strong><br/>'
		.$result['message']. '<br/><em>'
		.$result['add_date_fr']. '</em></p>');
	}
} else{
	addMessage();
	require 'index.php';
	$chat = getChat();
	while ($result = $chat -> fetch()) {
	echo('<p><strong>' .$result['pseudo']. ' : </strong><br/>'
		.$result['message']. '<br/><em>'
		.$result['add_date_fr']. '</em></p>');
	}
}


