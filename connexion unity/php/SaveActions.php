<?php
include("Exchange.class.php");
  //marcheGauche,marcheDroite, saute,  recharge
if(!empty($_POST))
{
    $response= new Exchange();
    foreach($_POST as $key=>$val)
    {   
        $response->Add($val);
    }
    
 
   
  $fp = fopen('JsonFiles/JsonFilesresults.json', 'w');
  fwrite($fp, json_encode($response));
  fclose($fp);
}
else    
{
    echo("Arrête Khun!!!");
}

?>