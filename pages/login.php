<?php
session_start();

  if(isset($_SESSION['erreurLogin']))
  {
  	$erreurLogin=$_SESSION['erreurLogin'];
  } 
  else 
  {
  	$erreurLogin="";
  }

  session_destroy();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login -Gestion des stagiaires</title>


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
		  <div class="panel-heading">Se Connecter...</div>
		  <div class="panel-body">

			<form method="post" action="seConnecter.php" class="form">
				
				<?php if(!empty($erreurLogin)) { ?>
				<div class="alert alert-danger">
					<?=$erreurLogin; ?>
				</div>
			<?php } ?>

				<div class="form-group">
					<label for="niveau">Login:</label>
					<input type="text" name="login" placeholder="Entrer votre login ici..." class="form-control">
				</div>

				<div class="form-group">
					<label for="niveau">Mot de Passe:</label>
					<input type="password" name="pwd" placeholder="Votre mot de passe ici..." class="form-control">
				</div>

				<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-log-in"></span>  Se Connecter</button>

				<a href="password_oublie.php">Mot de passe oublié</a>
				&nbsp;

				<a href="nouvelUtilisateur.php">Créer un Compte</a>

			</form>


		</div>
	</div>

	</div>

</body>
</html>
