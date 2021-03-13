<?php 
//require_once("identifier_session.php");

require_once('../base_de_donnees/connexion_bd.php');


$idUser=isset($_GET['idUser'])?$_GET['idUser']:0;
$etat=isset($_GET['etat'])?$_GET['etat']:0;

/*changement de l'ancien etat en nouvel etat */

if($etat==1)
	$newEtat=0;
else
	$newEtat=1;


	$requete="UPDATE utilisateurs SET etat=? WHERE idUser=?";
    $params=array($newEtat,$idUser);

    $resultat=$pdo->prepare($requete);
    $resultat->execute($params);

    header('Location:utilisateurs.php');




?>