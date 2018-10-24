<?php

ini_set('error_reporting', E_ALL | E_STRICT);
ini_set('display_errors', 1);

define ('DB_HOST', 'localhost');
define ('DB_USER', 'root');
define ('DB_PWD', '');
define ('DB_NAME', 'exo9');
define ('MYSQL_DSN', 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8');

?>