<?php
session_start();

$_SESSION = array();
session_destroy();

setcookie('pseudo', '');
setcookie('pass', '');

header('Location: ./connexion.php');