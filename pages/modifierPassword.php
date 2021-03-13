<?php 
require_once('identifier_session.php');

?>
<!DOCTYPE html>
<html>
<head>
	
	 <meta charset="utf-8">
	 <title>Changer Mot de Passe -Gestion des stagiaires</title>

	 <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	 <link rel="stylesheet" type="text/css" href="../css/glyphicon.css">
	 <link rel="stylesheet" type="text/css" href="../css/style.css">

	 <link rel="stylesheet" type="text/css" href="../fonts/glyphicons-halflings-regular.eot">
	 <link rel="stylesheet" type="text/css" href="../fonts/ glyphicons-halflings-regular.woff">

	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

     <script  src="../js/jquery-3.5.1.js"></script>
     <script type="text/javascript" src="../js/monjs.js"></script>
</head>
<body>

	<div class="container editpwdPage ">
		<h1 class="text-center">Changement du Mot de Passe</h1>
		<h2 class="text-center"><?php echo $_SESSION['user']['login'];?> </h2>

		<form class="form-horizontal" method="post" action="updatePassword.php">
			<input type="password" name="oldpassword" class="form-control ancienMotDePasse" placeholder="Tapez l'ancien Mot de Passe" required> &nbsp; <i class="glyphicon glyphicon-plus voirAncienMotDePasse" ></i>Voir

			<input type="password" name="newpassword" class="form-control nouveauMotDePasse" placeholder="Tapez le nouveau mot de passe" required> <i class="glyphicon glyphicon-plus voirNouveauMotDePasse"></i>Voir

			<button type="submit" value="Enregistrer" class="btn btn-primary">Enregistrer</button>

			
		</form>


	</div>

</body>
</html>