<?php 
//require_once("identifier_session.php");

require_once('../base_de_donnees/connexion_bd.php');


$idUser=isset($_POST['idUser'])?$_POST['idUser']:0;
$login=isset($_POST['login'])?$_POST['login']:"";
$email=isset($_POST['email'])?$_POST['email']:"";
$role=isset($_POST['role'])?$_POST['role']:"";


	$requete="UPDATE utilisateurs SET login=?, email=?, role=? WHERE idUser=?";
    $params=array($login,$email,$role,$idUser);

    $resultat=$pdo->prepare($requete);
    $resultat->execute($params);

    header('Location:utilisateurs.php');




?>