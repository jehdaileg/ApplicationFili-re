<?php
//require_once("identifier_session.php");

require_once('../base_de_donnees/connexion_bd.php');

$IDfil=isset($_GET['IDfil'])?$_GET['IDfil']:0;
$requete_fil="SELECT * FROM filieres WHERE idFiliere=$IDfil";
$resultat=$pdo->query($requete_fil);
$filiere=$resultat->fetch();
$nomfil=$filiere['nomFiliere'];
$niveau=strtolower($filiere['niveau']);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Edition de la filière -Gestion des stagiaires</title>

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
		  <div class="panel-heading">Veuillez modifier la filière...</div>
		  <div class="panel-body">

			<form method="post" action="updateFiliere.php" class="form">
        <div class="form-group">
          <label for="niveau">ID de la filière:  <?= $IDfil; ?></label>
          <input type="hidden" name="IDfil"  class="form-control" value="<?= $IDfil; ?>">
        </div>

				<div class="form-group">
					<label for="niveau">Nom de la filière:</label>
					<input type="text" name="filiere" placeholder="Saisissez le nom de la filière" class="form-control" value="<?= $nomfil;  ?>">
				</div>

				<div class="form-group">
				<label for="niveau">Niveau:</label>
				<select name="niveau"  class="form-control">
					<option value="m"  <?php if($niveau=="m")  {echo "selected";} ?>>Master</option>
					<option value="l"  <?php if($niveau=="l")  {echo "selected";} ?>>Licence</option>
					<option value="ts" <?php if($niveau=="ts") {echo "selected";} ?>>Technicien Spécialisé</option>
					<option value="t"  <?php if($niveau=="t")  {echo "selected";} ?>>Technicien</option>
					<option value="q"  <?php if($niveau=="q")  {echo "selected";} ?>>Qualification</option>
				</select>
				</div>

				<br>

				<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-save"></span>Valider Modifications</button>

			</form>


		</div>
	</div>

	</div>

</body>
</html>
