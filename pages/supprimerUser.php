<?php
//require_once("identifier_session.php");

require_once('../base_de_donnees/connexion_bd.php');

$idUser=isset($_GET['idUser'])?$_GET['idUser']:0;

  $delete_user="DELETE FROM utilisateurs WHERE idUser=?";
  $params=array($idUser);
  $resultat=$pdo->prepare($delete_user);
  $resultat->execute($params);

  header('Location:utilisateurs.php');




?>
