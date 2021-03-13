<?php

function recherher_par_login($log)   //recherche et vérifie le nombre de logins présents dans utilisateurs
{
	global $pdo;
	$requete=$pdo->prepare("SELECT * FROM utilisateurs WHERE login=?");
	$requete->execute(array($log));
	return $requete->rowCount();
} 

function rechercher_par_email($eml)   //recherche et vérifie le nombre de mails présents dans utilisateurs 
{
	global $pdo;
	$requete=$pdo->prepare("SELECT * FROM utilisateurs WHERE email=?");
	$requete->execute(array($eml));
	return $requete->rowCount();
}

?>