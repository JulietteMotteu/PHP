<?php
if (preg_match('#^[0-9]{3,}$#', "888544847979646")) {
	echo 'VRAI';
}
else {
	echo 'FALSE';
}
echo '<br>';

$date = preg_replace("#^([0-9]{2}/)([0-9]{2}/)([0-9]{4})$#", '$1 $2 $3', '04/12/1988');
echo $date;