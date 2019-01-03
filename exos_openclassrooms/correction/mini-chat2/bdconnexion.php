<?php
try
			{
				$base=new PDO('mysql:host=localhost;dbname=oc','root','');
			}
			catch(Exception $e)
			{
				die('ERREUR: '.$e->getMessage());
			}
			?>