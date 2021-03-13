<?php
//require_once("identifier_session.php");

require_once('../base_de_donnees/connexion_bd.php');

$IDfil=isset($_GET['IDfil'])?$_GET['IDfil']:0;

/* Gestion de la clé étrangère idFilier dans la table stagiaires */
$requeteCountStag="SELECT count(*) countST FROM stagiaires WHERE idFiliere=$IDfil";
$resultaS=$pdo->query($requeteCountStag);
$tabStag=$resultaS->fetch();
$nbrStag=$tabStag['countST'];

/*Fin de la gestion de la clé étrangère dans la table stagiaires */
if($nbrStag==0)    //S'il n'y a pas de stagiaires inscrits dans la filière, on peut Supprimer 
{
  $deleteFilier="DELETE FROM filieres WHERE idFiliere=?";
  $params=array($IDfil);
  $resultat=$pdo->prepare($deleteFilier);
  $resultat->execute($params);

  header('Location:filieres.php');
}
else
{
  $msg="Suppression Impossible: Présence des stagiaires dans cette filière";
  header("Location:alertes.php?message=$msg");

}


?>
