<?php
//Etablissement de la connexion à la Base de données 

try {
	$pdo=new PDO('mysql:host=localhost;dbname=gestion_stagiaires', 'root', '');

} catch(Exception $e)
{
	die('Error at database connexion:' .$e->getMessage());
}


?>