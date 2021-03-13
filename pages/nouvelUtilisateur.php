<?php
require_once("../base_de_donnees/connexion_bd.php");

require_once("../functions/functions.php");

//echo 'NbreUsers' .rechercher_par_email('jehdailegrand12@gmail.com');

if($_SERVER['REQUEST_METHOD']=='POST')
{
	$login=$_POST['login'];
	$password1=$_POST['password1'];
	$password2=$_POST['password2'];
	$email=$_POST['email'];

	$errorsValidation=array();


	if(isset($_POST['login']))
	{
		$filteredLogin=filter_var($login, FILTER_SANITIZE_STRING);

		if(strlen($filteredLogin)<4){
			$errorsValidation[]='Erreur, le login doit contenir au moins 4 caractères';
		}
	}

	if(isset($password1) && isset($password2))
	{
		if(empty($password1))
		{
			$errorsValidation[]='Erreur, le mot de passe ne doit pas etre vide!';

		}

		if(md5($password1) !== md5($password2))
		{
			$errorsValidation[]='Erreur, les deux mots de passe doivent correspondre';
		}
	}

	if(isset($email))
	{
		$filteredMail=filter_var($email, FILTER_SANITIZE_EMAIL);

		if($filteredMail !=true)
		{
			$errorsValidation[]='Adresse mail invalide';
		}
	}

	if(empty($errorsValidation))
	{
		if(rechercher_par_email($email)==0 & recherher_par_login($login)==0)
		{
			$requete=$pdo->prepare("INSERT INTO utilisateurs(login,email,role,etat,pwd) VALUES (:plogin,:pemail,:prole,:petat,:ppwd)");

			$requete->execute(array( 'plogin'=>$login,
				                     'pemail'=>$email,
				                     'prole'=>'VISITEUR',      
				                     'petat'=>0,
				                     'ppwd'=>md5($password1)

			));

			$succes="Félicitations, votre compte a été crée avec succès";
			echo $succes;
			header("refresh:2;url=login.php");

		}else if(rechercher_par_login($login) > 0){

			$errorsValidation[]='Désolé, ce nom user est déjà utilisé';

		}else if(rechercher_par_email($email) > 0){

			$errorsValidation[]="Désolé, cette adresse mail est déjà utilisée";

		}

	}


}


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Nouveau Compte Utilisateur</title>

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
		<div class="panel-heading">Veuillez Saisir les informations requises svp...</div>
		<div class="panel-body">
            
            <?php if(isset($errorsValidation) && !empty($errorsValidation)&& isset($_POST)) : ?>

            <div class="alert alert-danger">
            	<?php foreach($errorsValidation as $errors): ?>
            		<ul>
            			<li><?=$errors;?></li>
            		</ul>

            	<?php endforeach; ?>
            </div>

        <?php endif; ?>

			<form method="post" class="form">

				<div class="form-group">
					<label for="login">Nom d'utilisateur(login):</label>
					<input type="text" name="login" placeholder="Entrer votre nom d'utilisateur ic..." class="form-control">
				</div>

				<div class="form-group">
					<label for="login">Mot de Passe:</label>
					<input type="password" name="password1" placeholder="Tapez votre mot de Passe" class="form-control">
				</div>

				<div class="form-group">
					<label for="login">Confirmer le mot de passe:</label>
					<input type="password" name="password2" placeholder="Retapez votre mot de passe" class="form-control">
				</div>

				<div class="form-group">
					<label for="login">Saisir votre adresse mail:</label>
					<input type="email" name="email" placeholder="Tapez votre adresse mail" class="form-control">
				</div>

				<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-save"></span> Créer</button>

			</form>


		</div>
	</div>

	</div>

</body>
</html>
