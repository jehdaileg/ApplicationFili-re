<?php

require_once('identifier_session.php');

require_once('../base_de_donnees/connexion_bd.php');

$idUser=$_SESSION['user']['idUser'];


$oldPassword=isset($_POST['oldpassword'])?md5($_POST['oldpassword']):"";
$newPassword=isset($_POST['newpassword'])?md5($_POST['newpassword']):"";


$requete="SELECT * FROM utilisateurs WHERE idUser=$idUser and pwd=$oldPassword";

$resultat=$pdo->prepare($requete);

$resultat->execute();

$msg="";

$interval=3;
$url="login.php";


if($resultat->fetch())
{
	$requete="UPDATE utilisateurs SET pwd=MD5(?) WHERE idUser=?";
	$params=array($newPassword,$idUser);
	$resultat=$pdo->prepare($requete);
	$resultat->execute($params);

	$msg="<div class='alert alert-success'> <strong> Félicitations</strong>, votre mot de passe a été mofdifié avec Succès </div>";

	
}
else {
	$msg=" <div class='alert alert-danger'> <strong>Erreur</strong>l'ancien mot de passe n'est pas exacte</div>";

	$url=$_SERVER['HTTP_REFERER'];
}

?>

<!DOCTYPE html>
<html>
<head>
	 <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	 <link rel="stylesheet" type="text/css" href="../css/glyphicon.css">

	 <link rel="stylesheet" type="text/css" href="../fonts/glyphicons-halflings-regular.eot">
	 <link rel="stylesheet" type="text/css" href="../fonts/ glyphicons-halflings-regular.woff">

	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<title></title>
</head>
<body>

	<div class="container">
		<?php
         echo $msg;
		header("refresh:$interval;url=$url");  

		?>
	</div>

</body>
</html>