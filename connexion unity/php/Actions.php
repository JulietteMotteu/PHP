<?php
header("Content-type: application/json; charset=utf-8");
$buffer = file_get_contents("JsonFiles/JsonFilesresults.json");
echo($buffer);
?>