<?php
//require_once("identifier_session.php");

require_once('../base_de_donnees/connexion_bd.php');

$idS=isset($_GET['idS'])?$_GET['idS']:0;
$requete_stag="SELECT * FROM stagiaires WHERE idStagiaire=$idS";
$resultat=$pdo->query($requete_stag);
$stagiaire=$resultat->fetch();
$nom=$stagiaire['nom'];
$prenom=$stagiaire['prenom'];
$civilite=strtoupper($stagiaire['civilite']);
$nomphoto=$stagiaire['photo'];
$idFiliere=$stagiaire['idFiliere'];

//Requete pour recuperer toutes les filieres de la BDD pour etablir la relation 
$requete_fil="SELECT * FROM filieres";
$resultatF=$pdo->query($requete_fil);


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Edition du Stagiaire -Gestion des stagiaires</title>

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
		  <div class="panel-heading">Veuillez modifier les informations du Stagiaire...</div>
		  <div class="panel-body">

			<form method="post" action="updateStagiaire.php" class="form" enctype="multipart/form-data">

				 <div class="form-group">
                    <label for="niveau">ID du Stagiaire:  <?= $idS; ?></label>
                    <input type="hidden" name="idS"  class="form-control" value="<?= $idS; ?>">
                    </div>
       

				<div class="form-group">
					<label for="niveau">Nom du Stagiaire:</label>
					<input type="text" name="nom" placeholder="Saisissez le nom de la filière" class="form-control" value="<?= $nom;  ?>">
				</div>

				<div class="form-group">
					<label for="niveau">Prenom du Stagiaire:</label>
					<input type="text" name="prenom" placeholder="Saisissez le nom de la filière" class="form-control" value="<?= $prenom;  ?>">
				</div>

				

				<div class="form-group">
					<label for="civilite">Civilite:</label><br>
					<label><input type="radio" name="civilite" value="F" <?php if($civilite==="F") echo "checked";?>> F</label><br>
					<label><input type="radio" name="civilite" value="M" <?php if($civilite==="M") echo "checked";?>> M</label>
				</div>

				<div class="form-group">
				<label for="filiere">Filiere:</label>
				<select name="filiere"  class="form-control">
					<?php while($filiere=$resultatF->fetch()) {   ?>
						<option value="<?= $filiere['idFiliere']; ?>" <?php if($idFiliere===$filiere['idFiliere'])echo "selected";  ?>   ><?= $filiere['nomFiliere']; ?></option>
					<?php  }  ?>

					
				</select>
				</div>

				<div class="form-group">
					<label for="civilite">Photo:</label>
					<input type="file" name="photo"/>
				</div>

				<br>

				<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-save"></span>Valider Modifications</button>

			</form>


		</div>
	</div>

	</div>

</body>
</html>
