<?php
//require_once("identifier_session.php");


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Nouvelle Filière -Gestion des stagiaires</title>

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
		<div class="panel-heading">Veuillez Saisir les Valeurs de la nouvelle filière...</div>
		<div class="panel-body">

			<form method="post" action="insertIntoFiliere.php" class="form">
				<div class="form-group">
					<label for="niveau">Noml de la filière:</label>
					<input type="text" name="filiere" placeholder="Saisissez le nom de la filière" class="form-control">
				</div>


				<div class="form-group">

				<label for="niveau">Niveau:</label>
				<select name="niveau" id="niveau" class="form-control">
					<option value="m">Master</option>
					<option value="l" >Licence</option>
					<option value="ts" selected>Technicien Spécialisé</option>
					<option value="t" >Technicien</option>
					<option value="q">Qualification</option>
				</select>
				</div>

				<br>

				<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-save"></span> Enregistrer</button>

			</form>


		</div>
	</div>

	</div>

</body>
</html>
