<?php
//require_once("identifier_session.php");

require_once('../base_de_donnees/connexion_bd.php');
/*Question de Pagination */
$size=isset($_GET['size'])?$_GET['size']:3;
$page=isset($_GET['page'])?$_GET['page']:1;
$offset=($page-1)*$size;

/*Selection et récupération de toutes les filières provenant de la Base des données */


/*Traitement de la recherche et l'affichage des stagiaires selon les critères */

//Récupération des éléments de recherche
$login=isset($_GET['login'])?$_GET['login']:"";

$requeteUser="SELECT * FROM utilisateurs WHERE login LIKE '%$login%'";
$requeteCountUser="SELECT count(*) countU FROM utilisateurs WHERE login LIKE '%$login%' ";

/*Exécution des Requêtes ci-haut */
$resultat_users=$pdo->query($requeteUser);
$resultat_count_usr=$pdo->query($requeteCountUser);
$tabCounter=$resultat_count_usr->fetch();
$nbreUsers=$tabCounter['countU'];

/*Finalisation de la pagination */
$reste=$nbreUsers%$size;

if($reste==0)
{
	$nbrePages=$nbreUsers/$size;

}
else
{
	$nbrePages=floor($nbreUsers/$size)+1;
}


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Les Utilisateurs -Gestion des stagiaires</title>


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

	<div class="container">

		<div class="panel panel-success margetop">
		<div class="panel-heading">Recherche des Utilisateurs...</div>
		<div class="panel-body">
			<form  action="utilisateurs.php" method="get" class="form-inline">
				<div class="form-group">
					<input type="text" name="login" placeholder="Entrer votre login ici..." class="form-control" value="<?= $login; ?>"> &nbsp;

				</div>
				<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search"></span> Rechercher</button>
	
			</form>

		</div>
	</div>
	    <div class="panel panel-primary margetop">
		<div class="panel-heading">Liste des Utilisateurs (<?= $nbreUsers; ?>)...</div>
		<div class="panel-body">
			<table class="table table-bordered table striped">
				<thead>
					<tr>
						<th>Id User</th><th>Login</th><th>Email</th><th>Role</th><th>Actions</th>
					</tr>
				</thead>

				<tbody>
					<?php while($user=$resultat_users->fetch()) { ?>
						<tr class="<?php echo $user['etat']==1?'success':'danger';?>">
							<td><?= $user['idUser'];  ?></td>
							<td><?= $user['login'];?></td>
							<td><?= $user['email']; ?></td>
							<td><?= $user['role'];  ?></td>
							
							<td>
								<a href="editerUser.php?idUser=<?= $user['idUser']; ?>"><span class="glyphicon glyphicon-edit"></span>Editer</a>

								<a href="supprimerUser.php?idUser=<?= $user['idUser']; ?>" onclick="return confirm('Etes-vous sûr de vouloir supprimer  lUtilisateur selectionnné ?');"><span class="glyphicon glyphicon-trash"></span>Supprimer</a>
								&nbsp; &nbsp;

								<a href="activerOuDesactiverUser.php?idUser=<?= $user['idUser']; ?>&etat=<?= $user['etat'];?>">
									<?php

									if ($user['etat']==1) {
										echo '<span class="glyphicon glyphicon-remove"></span>';
									 	
									 } 
									 else {
									 	echo '<span class="glyphicon glyphicon-ok"></span>';
									 }

									?>
									
								</a>
							</td>
						</tr>
						<?php } ?>


				</tbody>
			</table>

			<div>
				<?php for($i=1;$i<=$nbrePages;$i++) {  ?>
					<ul class="pagination">
						<li class="<?php if($i==$page) echo 'active'; ?>"><a href="Utilisateurs.php?page=<?= $i; ?>&login=<?= $login; ?>"><?= $i; ?></a></li>

					</ul>
				<?php } ?>

			</div>
		</div>
	</div>

	</div>

</body>
</html>
