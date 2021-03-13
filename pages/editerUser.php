<?php
//require_once("identifier_session.php");

require_once('../base_de_donnees/connexion_bd.php');

$idUser=isset($_GET['idUser'])?$_GET['idUser']:0;
$requete_user="SELECT * FROM utilisateurs WHERE idUser=$idUser";
$resultat=$pdo->query($requete_user);
$user=$resultat->fetch();
$login=$user['login'];
$email=$user['email'];
$role=strtoupper($user ['role']);


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Edition de l'Utilisateur -Gestion des stagiaires</title>

	   <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	   <link rel="stylesheet" type="text/css" href="../css/style.css">
	   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

	<?php include("menu.php");  ?>

	<div class="container">

	    <div class="panel panel-primary margetop">
		  <div class="panel-heading">Veuillez modifier les informations de l'Utilisateur...</div>
		  <div class="panel-body">

			<form method="post" action="updateUser.php" class="form">

				 <div class="form-group">
                    <label for="niveau">ID de l'Utilisateur:  <?= $idUser; ?></label>
                    <input type="hidden" name="idUser"  class="form-control" value="<?= $idUser; ?>">
                    </div>
       

				<div class="form-group">
					<label for="niveau">Login Utilisateur:</label>
					<input type="text" name="login"  class="form-control" value="<?= $login;  ?>">
				</div>

				<div class="form-group">
					<label for="niveau">Email Utilisateur:</label>
					<input type="text" name="email"  class="form-control" value="<?= $email;  ?>">
				</div>

				<div class="form-group">
					<select name="role" class="form-control">
						<option value="ADMIN" <?php if($role==="ADMIN") echo "selected";?>>Admin</option>
						<option value="VISITEUR" <?php if($role==="VISITEUR") echo "selected"; ?>>Visiteur</option>						
					</select>
					
				</div>


				<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-save"></span>Valider Modifications</button>
				&nbsp; &nbsp;

				<a href="modifierPassword.php?idUser=<?= $idUser; ?>">Changer le mot de passe</a>

			</form>


		</div>
	</div>

	</div>

</body>
</html>
