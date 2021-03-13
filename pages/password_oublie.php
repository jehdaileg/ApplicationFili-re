<?php
require_once("../base_de_donnees/connexion_bd.php");
require_once("../functions/functions.php");

$email=isset($_POST['email'])?$_POST['email']:"";

$user=rechercher_par_email($email);

if($user!=null)
{
	$id_user= $user['idUser'];
	$requete=$pdo->prepare("UPDATE utilisateurs SET pwd=MD5('0000') WHERE idUser=$id_user");
	$requete->execute();

	$to=$email;
	$objet="Réinitialisation du mot de passe";
	$content="Votre nouveau mot de passe est 0000, veuillez le modifier une fois que vous serez connectés";
	$entetes="From Appli Gestion des stagiaires" ."/n". "CC:jehdailegrand12@gmail.com";

	mail($to, $objet, $content, $entetes);

} else
{
	echo "Incorrecte";
}



?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Réinitialisation Mot de Passe- Gestion des Stagiaires</title>


	 <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	 <link rel="stylesheet" type="text/css" href="../css/glyphicon.css">

	 <link rel="stylesheet" type="text/css" href="../fonts/glyphicons-halflings-regular.eot">
	 <link rel="stylesheet" type="text/css" href="../fonts/ glyphicons-halflings-regular.woff">

	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>

	<?php include("menu.php");  ?>
	<br><br>

	<div class="container col-lg-6 col-lg-offset-4 col-md-3 col-md-offset-3" >

	    <div class="panel panel-primary margetop">
		  <div class="panel-heading">Réinitialisation Mot de Passe...</div>
		  <div class="panel-body">

			<form method="post" class="form">
				
				<div class="form-group">
					<label for="niveau">Adresse Mail:</label>
					<input type="text" name="email" placeholder="Entrer votre adresse mail ici..." class="form-control">
				</div>

				<button type="submit" class="btn btn-primary">Confirmer la réinitialisation</button>
			</form>


		</div>
	</div>

	</div>

</body>
</html>
