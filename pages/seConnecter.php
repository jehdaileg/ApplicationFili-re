<?php
session_start();

require_once('../base_de_donnees/connexion_bd.php');

$login=isset($_POST['login'])?$_POST['login']:"";
$pwd=isset($_POST['pwd'])?$_POST['pwd']:"";

$requete="SELECT idUser,login,email,role,etat FROM utilisateurs WHERE login='$login' AND pwd=MD5('$pwd')";
$resultat=$pdo->query($requete);

/* Teste général si l'utilisateur et ses données correspondent */

if($user=$resultat->fetch())
{
	if($user['etat']==1)  //celui qui est activé à l'état 1 a le droit d'accéder à une session
	{
		$_SESSION['user']=$user;
		header('Location:../index.php');
	}
	else 
	{
		$_SESSION['erreurLogin']='<strong>Erreur!!!</strong>Votre compte est désactivé, contactez Admin';

		header('Location:login.php');
	}

}  else {
	   $_SESSION['erreurLogin']='<strong>Nom User ou mot de passe incorrect</strong>';

	   header('Location:login.php');
} 



?>