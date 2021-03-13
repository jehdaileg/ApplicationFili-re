<?php
//require_once("identifier_session.php");

require_once('../base_de_donnees/connexion_bd.php');



//Requete pour recuperer toutes les filieres de la BDD pour etablir la relation 
$requete_fil="SELECT * FROM filieres";
$resultatF=$pdo->query($requete_fil);


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Nouveau Stagiaire -Gestion des stagiaires</title>

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
		  <div class="panel-heading">Enregistrement Nouveau Stagiaire...</div>
		  <div class="panel-body">

			<form method="post" action="insertIntoStagiaire.php" class="form" enctype="multipart/form-data">

				<div class="form-group">
					<label for="niveau">Nom du Stagiaire:</label>
					<input type="text" name="nom" placeholder="Saisissez le nom du stagiaire" class="form-control">
				</div>

				<div class="form-group">
					<label for="niveau">Prenom du Stagiaire:</label>
					<input type="text" name="prenom" placeholder="Saisissez le prenom du Stagiaire" class="form-control">
				</div>

				<div class="form-group">
					<label for="civilite">Civilite:</label><br>
					<label><input type="radio" name="civilite" value="F" checked> F</label><br>
					<label><input type="radio" name="civilite" value="M"> M</label>
				</div>

				<div class="form-group">
				<label for="filiere">Filiere:</label>
				<select name="filiere"  class="form-control">
					<?php while($filiere=$resultatF->fetch()) {   ?>
						<option value="<?= $filiere['idFiliere']; ?>"><?= $filiere['nomFiliere']; ?></option>
					<?php  }  ?>

					
				</select>
				</div>

				<div class="form-group">
					<label for="civilite">Photo:</label>
					<input type="file" name="photo"/>
				</div>

				<br>

				<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-save"></span>Enregistrer</button>

			</form>


		</div>
	</div>

	</div>

</body>
</html>
