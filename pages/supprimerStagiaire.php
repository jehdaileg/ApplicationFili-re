<?php
//require_once("identifier_session.php");
require_once('../base_de_donnees/connexion_bd.php');

$idS=isset($_GET['idS'])?$_GET['idS']:0;

  $deleteStagiaire="DELETE FROM stagiaires WHERE idStagiaire=?";
  $params=array($idS);
  $resultat=$pdo->prepare($deleteStagiaire);
  $resultat->execute($params);

  header('Location:stagiaires.php');




?>
